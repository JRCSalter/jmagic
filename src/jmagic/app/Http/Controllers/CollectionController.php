<?php

namespace App\Http\Controllers;
use App\Models\Scryfall;

class CollectionController extends Controller
{
    public $binders = [
            "binder1",
            "binder2",
            "binder3",
    ];

    public $decks = [
            "deck1",
            "deck2",
            "deck3",
    ];

    public $data = [
        [
            "set_code" => "xln",
            "collector_number" => "10",
        ],
        [
            "set_code" => "kld",
            "collector_number" => "23",
        ],
        [
            "set_code" => "akh",
            "collector_number" => "123",
        ],
    ];

    // public function create()
    // public function store()
    public function index()
    {
        $cachedData = cache()->remember('/collection/index', 300, function() {
            $cachedData['setNames'] = Scryfall::getSetNames();
            $cachedData['cardNames'] = Scryfall::getCardNames();
            return $cachedData;
        });
        $data = $this->data;
        $binders = $this->binders;
        $decks = $this->decks;

            foreach ($data as $card)
            {
                $cards[] = Scryfall::getCard(
                    $card["set_code"],
                    $card["collector_number"],
                );
            }


        return view('collection.index', [
            'setNames'  => $cachedData['setNames'],
            'cardNames' => $cachedData['cardNames'],
            'cards'     => $cards,
            'treatments' => Scryfall::TREATMENTS,
            'conditions' => Scryfall::CONDITIONS,
            'languages' => Scryfall::LANGUAGES,
            'binders' => $binders,
            'decks' => $decks,
            'view' => $_GET['view'] ?? '',
        ]);


    }
    
    // public function show()
    
    public function edit()
    {
        $cachedData = cache()->remember('/collection/edit', 300, function() {
            $cachedData['setNames'] = Scryfall::getSetNames();
            $cachedData['cardNames'] = Scryfall::getCardNames();
            return $cachedData;
        });
        $binders = $this->binders;
        $decks = $this->decks;
        return view('collection.edit', [
            'setNames'  => $cachedData['setNames'],
            'cardNames' => $cachedData['cardNames'],
            'treatments' => Scryfall::TREATMENTS,
            'conditions' => Scryfall::CONDITIONS,
            'languages' => Scryfall::LANGUAGES,
            'binders' => $binders,
            'decks' => $decks,
        ]);
    }
    // public function update()
    public function destroy()
    {
        echo 'Card deleted' . '<br>';
        echo '<a href="/">Go Home</a>';
    }

}
