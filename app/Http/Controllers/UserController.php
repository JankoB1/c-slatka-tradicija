<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showProfile() {
        return view('auth.my-profile');
    }

    public function showEditProfile() {
        return view('auth.edit-profile');
    }

}
