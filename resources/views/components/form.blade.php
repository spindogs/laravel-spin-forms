<form
    method="{{ $method_spoof ? 'POST' : $method }}"
    {!! $files ? 'enctype="multipart/form-data"' : '' !!}
    {!! $attributes->merge() !!}
    >

    @if (!in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endif

    @if ($method_spoof)
        @method($method)
    @endif

    {!! $slot !!}

</form>