@php
    extract($field);
@endphp
<div class="form-group">
    <label for="id-{{ $name }}" class="form-label">{{ $label }}</label>
    <select
        class="form-select mb-3"
        name="{{ $name }}"
        id="id-{{ $name }}"
        {!! ($method == 'create' && $only_read_create ) ? 'disabled' : null  !!}
        {!! ($method == 'edit' && $only_read_edit ) ? 'disabled' : null  !!}
    >
        <option {{ $value == null && old($name) == null ? 'selected' : null }} value="1">{{ $placeholder }}</option>
        @foreach ($data as $item)
            @if($value)
            <option {!! $value == $item['value'] ? 'selected' : null !!} value="{{ $item['value'] }}">{{ $item['label'] }}</option>
            @else
            <option {!! $item['value'] == old($name) ? 'selected' : null !!} value="{{ $item['value'] }}">{{ $item['label'] }}</option>
            @endif

        @endforeach
    </select>
</div>
