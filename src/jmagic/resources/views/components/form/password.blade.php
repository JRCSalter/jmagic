@props([
    'id' => 'password',
    'label' => 'Password',
    'placeholder' => 'Enter a password...'
])

<label for="{{ $id }}">{{ $label }}</label>
<input
    id="{{ $id }}"
    name="{{ $id }}"
    type="password"
    inputmode="text"
    placeholder="{{ $placeholder }}"
    autocapitalize="none"
    autocomplete="off"
    {{ $attributes }}
>

