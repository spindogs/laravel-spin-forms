@if ($field_wrap)
    <x-form-wrap field-identifier="__textarea">
@endif

    <x-form-label label="{{ $label }}" :required="$required" for="{{ $id() }}" class="{{ $hasError() ? 'error' : '' }}" />

    <div class="input_wrap">

        <textarea
            id="{{ $id() }}"
            name="{{ $name }}"
            {{ $required ? 'required' : '' }}
            {!! $attributes->merge(['class' => $hasError() ? 'error' : '']) !!}
            >{!! $value !!}</textarea>

    </div>

    @if ($showError())
        <x-form-error name="{{ $name }}" />
    @endif

@if ($field_wrap)
    </x-form-wrap>
@endif