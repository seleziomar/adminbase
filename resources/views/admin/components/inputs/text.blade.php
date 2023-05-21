<div class="form-group">
    <label for="id-{{$field['name']}}" class="form-label">{{ $field['label'] }}</label>
    <input
        type="{{ $field['type'] }}"
        class="form-control"
        id="id-{{$field['name']}}"
        name="{{ $field['name'] }}"
        @isset($field['placeholder'])
        placeholder="{{$field['placeholder']}}"
        @endif
        @isset($field['value'])
        value="{{ old($field['name'], $field['value']) }}"
        @else
        value="{{ old($field['name']) }}"
        @endif

        @isset($field['input_mask'])
        data-inputmask="'mask': '{{$field['input_mask']}}'"
        @endisset
    >
</div>
