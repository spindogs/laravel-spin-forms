@if ($type == 'submit')
    <div class="submit_wrap">
@endif
    <button type="{{ $type }}">
        {!! trim($slot) ?: __('Submit') !!}
    </button>
@if ($type == 'submit')
    </div>
@endif