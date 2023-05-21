<div class="form-group">
    <label for="id-{{$field['name']}}" class="form-label">{{ $field['label'] }}</label>
    <select name="{{ $field['name'] }}" id="id-{{ $field['name'] }}" class="form-select mb-3">
        @isset($field['placeholder'])
        <option value="">{{ $field['placeholder'] }}</option>
        @endisset
        @foreach ($field['data'] as $item)

        @isset($field['value'])
        <option {!! $field['value'] === $item['value'] ? 'selected' : null !!} value="{{ $item['value'] }}">{{ $item['label'] }}</option>
        @else
        <option {!! $item['value'] === old($field['name']) ? 'selected' : null !!} value="{{ $item['value'] }}">{{ $item['label'] }}</option>
        @endif

        @endforeach
    </select>
</div>
