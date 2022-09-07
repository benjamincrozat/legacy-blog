<form method="{{ $method === 'GET' ? $method : 'POST' }}" {{ $attributes->except(['method']) }}>
    @if ($method !== 'GET')
        @csrf
    @endif

    @if (! in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    {{ $slot }}
</form>
