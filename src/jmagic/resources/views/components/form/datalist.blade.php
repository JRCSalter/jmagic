@props([
    'id',
    'options',
    'required' => false,
    'label' => '',
    'function' => '',
])

<label for="{{ $id }}"><?= $label == "" ? ucfirst($id) : $label ?></label>
<input type="text" list="{{ $id }}" id="{{ $id . '_input' }}" {!! $function !!}>
<datalist id="{{ $id }}" {{ $attributes }}>
    @if(!$required)
        <option value="" selected>-</option>
    @endif
    @foreach($options as $option)
        <option value="{{ $option }}">{{ $option }}</option>
    @endforeach
</datalist>
