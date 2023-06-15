@php
    extract($field)
@endphp
<div class="form-group">
    <label for="id-{{$name}}" class="form-label">{{ $label }}</label>
    <input
        type="{{ $type }}"
        class="form-control"
        id="id-{{$name}}"
        name="{{ $name }}"
        @if($placeholder)
        placeholder="{{$placeholder}}"
        @endif

        value="{{ old($name, $value) }}"

        @if($input_mask)
        data-inputmask="'mask': '{{$input_mask}}'"
        @endif

        {!! ($method == 'create' && $only_read_create ) ? 'disabled' : null  !!}
        {!! ($method == 'edit' && $only_read_edit ) ? 'disabled' : null  !!}
    >
</div>
