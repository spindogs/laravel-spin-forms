<label class="{{ $hasError() ? 'error' : '' }}" for="{{ $id() }}">
    <input
        type="radio"
        id="{{ $id() }}"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $readonly ? 'readonly' : '' }}
        @if ($selected) checked="checked" @endif
    />
    {!! $label !!}
</label>