<div class="form-group">
    <label for="id-{{$field['name']}}" class="form-label">{{ $field['label'] }}</label>
    <input
        type="text"
        class="form-control"
        id="id-{{$field['name']}}"
        @isset($field['placeholder'])
        placeholder="{{$field['placeholder']}}"
        @endif
        @isset($field['value'])
        value="{{ old($field['name'], $field['value']) }}"
        @else
        value="{{ old($field['name']) }}"
        @endif
    >
</div>
