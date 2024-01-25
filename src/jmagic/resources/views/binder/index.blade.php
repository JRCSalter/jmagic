<x-layout title="JMagic - My Collection">
    <h2 role="heading" aria-level="2">My Binders</h2>

    <details>
        <summary>Add Binder</summary>
        <form action="/binder/store" method="POST">
            <x-form.input id="name" />
            <x-form.textarea id="description" />
            <x-form.submit />
        </form>
    </details>

    <details>
        <summary>View Binders</summary>
        @foreach ($binders as $binder)
            <p>{{ $binder['name'] }}</p>
            <a href="/binder/edit">Edit</a><br>
            <form action="/binder" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <x-form.submit text="Delete" />
            </form>
           @endforeach
    </details>
</x-layout>

