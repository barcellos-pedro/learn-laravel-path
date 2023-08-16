<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /** Return view to register page */
    public function create()
    {
        return view('register.create');
    }

    /** Create a new User and then log in */
    public function store()
    {
        // Validate the form
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        // Create a new user
        $user = User::create($attributes);

        // Log in the user
        Auth::login($user);

        // redirect with session flash message
        return redirect('/')->with('success', 'Your account has been created!');
    }
}
