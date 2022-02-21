@if ($field_wrap)
    <x-form-wrap field-identifier="__textarea">
@endif

    <x-form-label label="{{ $label }}" :required="$required" for="{{ $id() }}" class="{{ $hasError() ? 'error' : '' }}" />

    @isset($pre_help)
        <div class="helper_wrap">
            {!! $pre_help !!}
        </div>
    @endisset

    <div class="input_wrap">

        <textarea
            id="{{ $id() }}"
            name="{{ $name }}"
            {{ $required ? 'required' : '' }}
            {{ $readonly ? 'readonly' : '' }}
            {!! $attributes->merge(['class' => $hasError() ? 'error' : '']) !!}
            >{!! $value !!}</textarea>

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