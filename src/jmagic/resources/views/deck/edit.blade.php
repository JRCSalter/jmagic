<x-layout title="JMagic - My Collection">
    <h2 role="heading" aria-level="2">Edit</h2>

    <form action="/collection/update" method="POST">
        <x-form.input id="name" />
        <x-form.textarea id="description" />
        <x-form.datalist id="format" :options="$formats" />
        <x-form.submit />
    </form>
</x-layout>


