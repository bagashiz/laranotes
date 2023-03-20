<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    // create shows a registration form to create a new user 
    public function create()
    {
        return view('users.register');
    }

    // store save a new user to the database
    public function store()
    {
        $formFields = request()->validate([
            'username' => ['required', 'min:3', 'max:20'],
            'password' => 'required|confirmed|min:8|max:255'
        ]);

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('success', 'Account created and logged in!');
    }

    // login show a form to authenticate a user
    public function login()
    {
        return view('users.login');
    }

    // auth authenticate a user
    public function auth()
    {
        $formFields = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            // generate a new session id
            request()->session()->regenerate();

            return redirect('/')->with('success', 'You are logged in!');
        }

        return back()->withErrors([
            'username' => 'Invalid username or password'
        ])->onlyInput('username');
    }

    // logout log the user out
    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out!');
    }
}
