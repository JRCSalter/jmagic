@props([
    'id',
    'label' => '',
])

<label for="{{ $id }}"><?= $label == "" ? ucfirst($id) : $label ?></label>
<input
    id="{{ $id }}"
    name="{{ $id }}"
    type="file"
    {{ $attributes }}
>


