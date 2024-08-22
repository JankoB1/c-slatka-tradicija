<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\UserRecipe;
use App\Repositories\UserRepository;
use App\Services\RecipeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected UserRepository $userRepository;
    protected RecipeService $recipeService;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->recipeService = new RecipeService();
    }

    public function showProfile() {
        $savedRecipes = $this->recipeService->getUserSaved(Auth::user()->id);
        //dd($savedRecipes);
        return view('auth.my-profile', compact('savedRecipes'));
    }

    public function showEditProfile() {
        return view('auth.edit-profile');
    }

    public function editDetails(Request $request) {
        $this->userRepository->updateProfileDetails($request);
    }

    public function editContactDetails(Request $request) {
        $this->userRepository->updateProfileDetailsContact($request);
    }

    public function showUsersList(UsersDataTable $dataTable) {
        if(Auth::user() == null || Auth::user()->admin == 0) {
            return redirect()->route('show-homepage');
        }
        return $dataTable->render('auth.admin.users-list');
    }

}
