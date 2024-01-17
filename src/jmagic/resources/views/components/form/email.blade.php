@props([
    'id' => 'email',
    'label' => 'Email',
    'placeholder' => 'Enter an email address...'
])

<label for="{{ $id }}">{{ $label }}</label>
<input
    id="{{ $id }}"
    name="{{ $id }}"
    type="email"
    inputmode="email"
    placeholder="{{ $placeholder }}"
    autocapitalize="none"
    {{ $attributes }}
>
