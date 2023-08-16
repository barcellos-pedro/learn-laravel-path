<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    /** Return view to show register page */
    public function create()
    {
        return view('register.create');
    }

    /** Create a new User */
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        User::create($attributes);

        return redirect('/')->with('success', 'Your account has been created!');
    }
}
