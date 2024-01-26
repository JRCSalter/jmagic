<x-layout title="Register with JMagic">
    <h2 role="heading" aria-level="2">Register</h2>

    <form action="/register" method="POST">
        @csrf
        <x-form.input id="username" :value="old('username')" required autofocus />
        <x-form.email required />
        <x-form.password required />
        <x-form.password
            id="password_confirmation"
            label="Confirm Password"
            placeholder="Confirm your password..."
            required
        />
        <button type="submit" role="button">Submit</button>
    </form>
</x-layout>

