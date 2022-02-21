<fieldset class="field_wrap {{ $type }}">
    <legend class="label_wrap {{ $hasError() ? 'error' : '' }}">{{ $title }}</legend>

    @isset($pre_help)
        <div class="helper_wrap">
            {!! $pre_help !!}
        </div>
    @endisset

    <div class="input_wrap">

        {!! $slot !!}

    </div>

    @if ($showError())
        <x-form-error name="{{ $name }}" />
    @endif

    @isset($post_help)
        <div class="helper_wrap">
            {!! $post_help !!}
        </div>
    @endisset

</fieldset>