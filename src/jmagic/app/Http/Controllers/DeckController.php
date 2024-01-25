<?php

namespace App\Http\Controllers;
use App\Models\Scryfall;

class DeckController extends Controller
{
    public $formats = [
        'Standard',
        'Commander',
        'Pauper'
    ];

    public $decks = [
        [
            'name' => 'Alt Win Con',
            'description' => 'Win by winning',
            'format' => 'Commander'
        ],
        [
            'name' => 'Emmara Tandris',
            'description' => 'Create tokens',
            'format' => 'Commander',
        ],
    ];
    // public function create()
    // public function store()
    public function index()
    {
        
        return view('deck.index', [
            'formats' => $this->formats,
            'decks' => $this->decks,
        ]);
    }
    
    // public function show()
    
    public function edit()
    {
        return view('deck.edit', [
            'formats' => $this->formats,
        ]);
    }

    // public function update()
    public function destroy()
    {
        echo 'Deck deleted' . '<br>';
        echo '<a href="/">Go Home</a>';
    }

}

