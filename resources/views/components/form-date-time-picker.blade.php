<div class="field_wrap __timepicker">

    <x-form-label label="{{ $label }}" :required="$required" for="{{ $id() }}" class="{{ $hasError() ? 'error' : '' }}" />

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

</div>

@push('scripts')
<script type="text/javascript">
    // Date/Time picker
    $("#{{ $id() }}").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>
@endpush