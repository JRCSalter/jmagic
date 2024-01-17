@props([
    'id' => 'number',
    'label' => '',
    'inputmode' => 'number',
])

<label for="{{ $id }}"><?= $label == '' ? ucfirst($id) : $label ?></label>
<input
    id="{{ $id }}"
    name="{{ $id }}"
    type="number"
    inputmode="{{ $inputmode }}"
    {{ $attributes }}
>

