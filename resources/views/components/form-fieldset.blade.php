<fieldset class="field_wrap {{ $type }}">
    <legend class="label_wrap {{ $hasError() ? 'error' : '' }}">{{ $title }}</legend>

    <div class="input_wrap">

        {!! $slot !!}

    </div>

    @if ($showError())
        <x-form-error name="{{ $name }}" />
    @endif

</fieldset>