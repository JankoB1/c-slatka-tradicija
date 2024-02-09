<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function updateProfileDetails(FormRequest $request) {
        try {
            $user = Auth::user();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->image_id = $request->image_id;
            $user->birthdate = $request->birthdate;
            $user->city = $request->city;
            $user->fb = $request->fb;
            $user->ig = $request->ig;
            $user->about = $request->about;
            $user->phone = $request->phone;
            $user->save();
            return $user;
        } catch (QueryException $exception) {
            Log::error('Can\'t update user profile details: ' . $exception->getMessage());
            return null;
        }
    }

}
