@if ($label)
    <div class="label_wrap">
        <label>
            {{ $label }}@if ($required)<span class="required">*</span>@endif
        </label>
    </div>
@endif