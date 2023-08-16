<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    /** Log out the user and redirect to the home page */
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye! 👋🏽');
    }
}
