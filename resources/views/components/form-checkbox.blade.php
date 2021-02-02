<div class="field_wrap __checkbox">
    @if ($title)
        <x-form-label label="{{ $title }}" :required="$required" class="{{ $hasError() ? 'error' : '' }}" />
    @endif

    <div class="input_wrap">
        @foreach ($options as $k => $v)
            <label class="{{ $hasError() ? 'error' : '' }}">
                <input
                    type="checkbox"
                    name="{{ $name }}"
                    value="{{ $k }}" @if ($isSelected($k)) checked @endif
                /> {{ $v }}
            </label>
        @endforeach
    </div>
    
    @if ($showError())
        <x-form-error name="{{ $name }}" />
    @endif

</div>
