@if ($type === 'hidden')
    <input
        type="{{ $type }}"
        id="{{ $id() }}"
        name="{{ $name }}"
        value="{{ $value }}"
    />
@else
    @if ($field_wrap)
        <x-form-wrap field-identifier="__{{ $type }}">
    @endif

        <x-form-label label="{{ $label }}" :required="$required" for="{{ $id() }}" class="{{ $hasError() ? 'error' : '' }}" />

        <div class="input_wrap">

            <input
                type="{{ $type }}"
                id="{{ $id() }}"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $required ? 'required' : '' }}
                {!! $attributes->merge(['class' => $hasError() ? 'error' : '']) !!}
            />

        </div>

        @if ($showError())
            <x-form-error name="{{ $name }}" />
        @endif

    @if ($field_wrap)
        </x-form-wrap>
    @endif
@endif