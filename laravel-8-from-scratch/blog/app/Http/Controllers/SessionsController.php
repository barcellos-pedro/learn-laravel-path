<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    /** Return view to login page */
    public function create()
    {
        return view('sessions.create');
    }

    /** Log in the User */
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials coud not be verified.'
            ]);
        }

        session()->regenerate();

        $name = ucwords(auth()->user()->name);

        return redirect('/')->with('success', "Welcome {$name}!");
    }

    /** Log out the user and redirect to the home page */
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye! 👋🏽');
    }
}
