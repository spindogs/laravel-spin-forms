@if ($field_wrap)
    <x-form-wrap field-identifier="{{ $type }}">
@endif

    @if ($title)
        <x-form-label label="{{ $title }}" :required="$required" class="{{ $hasError() ? 'error' : '' }}" />
    @endif

    <div class="input_wrap">

        {!! $slot !!}

    </div>

    @if ($showError())
        <x-form-error name="{{ $name }}" />
    @endif

@if ($field_wrap)
    </x-form-wrap>
@endif