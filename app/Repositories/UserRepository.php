<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function updateProfileDetails(Request $request) {
        try {
            $user = Auth::user();
            $user->about = $request->about;
            $user->birthdate = $request->birthdate;
            $user->city = $request->city;
            $user->fb = $request->fb;
            $user->ig = $request->ig;
            $user->save();
            return $user;
        } catch (QueryException $exception) {
            Log::error('Can\'t update user profile details: ' . $exception->getMessage());
            return null;
        }
    }

    public function updateProfileDetailsContact(Request $request)
    {
        try {
            $user = Auth::user();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->phone = $request->phone;
            $user->email = $request->email;
        }
        catch (QueryException $exception) {
            Log::error('Can\'t update user profile contact details: ' . $exception->getMessage());
            return null;
        }
    }

}
