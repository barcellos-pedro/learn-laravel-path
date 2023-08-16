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
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to authenticate and log in the user
        // based on provided credentials
        if (auth()->attempt($attributes)) {
            // prevent session fixation attack
            session()->regenerate();

            // redirect with a success session flash message
            $name = ucwords(auth()->user()->name);
            return redirect('/')->with('success', "Welcome {$name}!");
        }

        // validation failed
        throw ValidationException::withMessages(['email' => 'Your provided credentials coud not be verified.']);

        // another way to redirect with errors
        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credentials coud not be verified.']);
    }

    /** Log out the user and redirect to the home page */
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye! 👋🏽');
    }
}
