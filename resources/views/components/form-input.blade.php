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

        @isset($pre_help)
            <div class="helper_wrap">
                {!! $pre_help !!}
            </div>
        @endisset

        <div class="input_wrap">

            <input
                type="{{ $type }}"
                id="{{ $id() }}"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $required ? 'required' : '' }}
                {{ $readonly ? 'readonly' : '' }}
                {!! $attributes->merge(['class' => $hasError() ? 'error' : '']) !!}
            />

        </div>

        @if ($showError())
            <x-form-error name="{{ $name }}" />
        @endif

        @isset($post_help)
            <div class="helper_wrap">
                {!! $post_help !!}
            </div>
        @endisset

    @if ($field_wrap)
        </x-form-wrap>
    @endif
@endif