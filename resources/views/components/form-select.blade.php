@if ($field_wrap)
    <x-form-wrap field-identifier="{{ implode(' ', $type) }}">
@endif

    <x-form-label label="{{ $label }}" :required="$required" for="{{ $id() }}" class="{{ $hasError() ? 'error' : '' }}" />

    <div class="input_wrap {{ $hasError() ? 'error' : '' }}">
        <select
            id="{{ $id() }}"
            name="{{ $name }}"
            {{ $required ? 'required' : '' }}
            {{ $readonly ? 'readonly' : '' }}
            {{ $multiple ? 'multiple' : '' }}
            {!! $attributes->merge(['class' => $hasError() ? 'error' : '']) !!}
        >
            @if (!$multiple && $placeholder && !$images)
                <option></option>
            @endif
            @foreach ($options as $option)
                <option value="{{ $option['key'] }}" @if ($isSelected($option['key'])) selected @endif @if (array_key_exists('image', $option)) data-image="{{ $option['image'] }}" @endif>
                    {{ $option['value'] }}
                </option>
            @endforeach
        </select>
    </div>

    @if ($showError())
        <x-form-error name="{{ $name }}" />
    @endif

@if ($field_wrap)
    </x-form-wrap>
@endif

@push('scripts')
<script type="text/javascript">
    @if ($js_callback)
        {!! $js_callback !!}
    @endif

    $('#{{ $id() }}').select2({{!! implode(', ', $js_options) !!}});
</script>
@endpush