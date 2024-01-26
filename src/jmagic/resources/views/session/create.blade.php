<x-layout title="Login to JMagic">
    <h2 role="heading" aria-level="2">Login</h2>

    <form action="/login" method="POST">
        @csrf
        <x-form.email required autofocus />
        <x-form.password required />
        <button type="submit" role="button">Submit</button>
    </form>
</x-layout>
