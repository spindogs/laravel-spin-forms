@if ($field_wrap)
    <x-form-wrap field-identifier="__datepicker">
@endif

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
                        'DatePicker picker__input',
                        $hasError() ? 'error' : ''
                    ]
                )])
            !!}
        />

    </div>

    @if ($showError())
        <x-form-error name="{{ $name }}" />
    @endif

@if ($field_wrap)
    </x-form-wrap>
@endif

@push('scripts')
<script type="text/javascript">
    // Date picker
    $("#{{ $id() }}").flatpickr();
</script>
@endpush