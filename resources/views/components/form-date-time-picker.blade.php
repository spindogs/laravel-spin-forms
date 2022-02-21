@if ($field_wrap)
    <x-form-wrap field-identifier="__timepicker">
@endif

    <x-form-label label="{{ $label }}" :required="$required" for="{{ $id() }}" class="{{ $hasError() ? 'error' : '' }}" />

    @isset($pre_help)
        <div class="helper_wrap">
            {!! $pre_help !!}
        </div>
    @endisset

    <div class="input_wrap">

        <input
            type="text"
            id="{{ $id() }}"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $required ? 'required' : '' }}
            {!! $attributes->merge([
                'class' => implode(
                    ' ',
                    [
                        'BothPicker picker__input',
                        $hasError() ? 'error' : ''
                    ]
                )])
            !!}
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

@push('scripts')
<script type="text/javascript">
    // Date/Time picker
    $("#{{ $id() }}").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>
@endpush