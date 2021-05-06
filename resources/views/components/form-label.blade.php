@if ($label)
    <div class="label_wrap">
        <label {!! $attributes->merge() !!}>
            {{ $label }}@if ($required)<span class="required">*</span>@endif
        </label>
    </div>
@endif