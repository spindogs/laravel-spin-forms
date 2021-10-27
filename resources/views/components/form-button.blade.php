@if ($type == 'submit')
    <div class="submit_wrap">
@endif
    <button {{ $attributes->merge(['type' => $type]) }}>
        {!! trim($slot) ?: __('Submit') !!}
    </button>
@if ($type == 'submit')
    </div>
@endif