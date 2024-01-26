<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException as ValidationValidationException;

class SessionsController extends Controller
{
    /**
     * Shows the login page.
     * 
     * @return view
     */
    public function create()
    {
        return view('session/create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }
    // public function index()
    // public function show()
    // public function edit()
    // public function update()
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}