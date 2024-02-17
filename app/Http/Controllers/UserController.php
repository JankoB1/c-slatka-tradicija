<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function showProfile() {
        return view('auth.my-profile');
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

}
