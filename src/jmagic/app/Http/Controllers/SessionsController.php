<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    // public function store()
    // public function index()
    // public function show()
    // public function edit()
    // public function update()
    public function destroy()
    {
        return view('session/destroy');
    }
}