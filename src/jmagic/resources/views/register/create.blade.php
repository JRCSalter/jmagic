<x-layout title="Register with JMagic">
    <h2 role="heading" aria-level="2">Register</h2>

    <form action="/login/store" method="POST">
        <x-form.email required autofocus />
        <x-form.password required />
        <x-form.password
            id="password-check"
            label="Confirm Password"
            placeholder="Confirm your password..."
            required
        />
        <button type="submit" role="button">Submit</button>
    </form>
</x-layout>

