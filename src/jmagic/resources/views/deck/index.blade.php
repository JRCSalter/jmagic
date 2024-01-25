<x-layout title="JMagic - My Collection">
    <h2 role="heading" aria-level="2">My Decks</h2>

    <details>
        <summary>Add deck</summary>
        <form action="/deck/store" method="POST">
            <x-form.input id="name" />
            <x-form.datalist id="format" :options="$formats" />
            <x-form.textarea id="description" />
            <x-form.submit />
        </form>
    </details>

    <details>
        <summary>View Decks</summary>
        @foreach ($decks as $deck)
            <p>{{ $deck['name'] }}</p>
            <a href="/deck/edit">Edit</a><br>
            <form action="/deck" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <x-form.submit text="Delete" />
            </form>
           @endforeach
    </details>
</x-layout>
