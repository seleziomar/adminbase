@php
    extract($field);
@endphp
<div class="form-check form-switch mb-3">
    <input class="form-check-input" value="1" {!! isset($value) && $value === 1 ? 'checked' : null !!} name="{{ $name }}" type="checkbox" id="id-{{ $name }}">
    <label class="form-check-label" for="id-{{ $name }}">{{ $label }}</label>
</div>
