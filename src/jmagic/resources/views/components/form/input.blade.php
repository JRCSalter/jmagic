@props([
    'id',
    'label' => '',
])

<label for="{{ $id }}"><?= $label == "" ? ucfirst($id) : $label ?></label>
<input
    id="{{ $id }}"
    name="{{ $id }}"
    type="text"
    {{ $attributes(['value' => old($id)]) }}
>

