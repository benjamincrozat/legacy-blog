<form method="{{ $method === 'GET' ? $method : 'POST' }}" {{ $attributes->except(['method']) }}>
    @if ($method !== 'GET')
        @csrf
    @endif

    @if (! in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    @if ('GET' !== $method)
        <x-honeypot />
    @endif

    {{ $slot }}
</form>
