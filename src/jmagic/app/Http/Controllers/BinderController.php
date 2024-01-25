<?php

namespace App\Http\Controllers;
use App\Models\Scryfall;

class BinderController extends Controller
{
    public $binders = [
        [
            'name' => 'Collection',
            'description' => 'The main stuff',
        ],
        [
            'name' => 'Staples',
            'description' => 'Useful stuff',
        ],
    ];
    // public function create()
    // public function store()
    public function index()
    {
        return view('binder.index', [
            'binders' => $this->binders,
        ]);
    }
    
    // public function show()
    
    public function edit()
    {
        return view('binder.edit', [
        ]);
    }

    // public function update()
    public function destroy()
    {
        echo 'Binder deleted' . '<br>';
        echo '<a href="/">Go Home</a>';
    }

}


