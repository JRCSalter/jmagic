@props([
    'id',
    'options',
    'required' => false,
    'label' => '',
])

<?php

$options = explode(';;', $options);

?>

<label for="{{ $id }}"><?= $label == "" ? ucfirst($id) : $label ?></label>
<select id="{{ $id }}" {{ $attributes }}>
    @if(!$required)
        <option value="" selected>-</option>
    @endif
    @foreach($options as $option)
        <option value="{{ $option }}">{{ $option }}</option>
    @endforeach
</select>