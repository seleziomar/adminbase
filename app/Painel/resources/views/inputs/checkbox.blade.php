@php
    extract($field);
@endphp
<div class="form-check form-switch mb-3">
    <input class="form-check-input"
        {!! ($method == 'create' && $only_read_create ) ? 'disabled' : null  !!}
        {!! ($method == 'edit' && $only_read_edit ) ? 'disabled' : null  !!}
        value="1"
        {!! $value == 1 ? 'checked' : null !!}
        {!! old($name) == 1 ? 'checked' : null !!}
        name="{{ $name }}"
        type="checkbox"
        id="id-{{ $name }}"
    >
    <label class="form-check-label" for="id-{{ $name }}">{{ $label }}</label>
</div>
