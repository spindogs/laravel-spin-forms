<label class="{{ $hasError() ? 'error' : '' }}" for="{{ $id() }}">
    <input
        type="radio"
        id="{{ $id() }}"
        name="{{ $name }}"
        value="{{ $value }}"
        @if ($selected) checked="checked" @endif
    />
    {!! $label !!}
</label>