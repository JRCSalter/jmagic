@props([
    'id',
    'label' =>'',
    'placeholder' => 'Enter text...'
])

<label for="{{ $id }}"><?= $label == "" ? ucfirst($id) : $label ?></label>
<textarea
    id="{{ $id }}"
    name="{{ $id }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes }}
></textarea>