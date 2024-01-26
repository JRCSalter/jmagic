<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Shows the login page.
     * 
     * @return view
     */
    public function create()
    {
        return view('register/create');
    }
    public function store()
    {
        echo 'Signed up';
        echo '<a href="/">Home</a>';
        $attributes = request()->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255|confirmed',
        ]);
    
        auth()->login(User::create($attributes));

        return redirect('/')->with('success', 'Your account has been created.');
    }
    // public function index()
    // public function show()
    // public function edit()
    // public function update()
    public function destroy()
    {
        return view('register/destroy');
    }
}
