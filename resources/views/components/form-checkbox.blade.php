<label class="{{ $hasError() ? 'error' : '' }}" for="{{ $id() }}">
    <input
        type="checkbox"
        id="{{ $id() }}"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $readonly ? 'readonly' : '' }}
        {!! $attributes->merge() !!}
        @if ($selected) checked="checked" @endif
    />
    {!! $label !!}@if ($required)<span class="required">*</span>@endif
</label>