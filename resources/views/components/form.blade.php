<form method="{{ 'GET' === $method ? $method : 'POST' }}" {{ $attributes->except(['method']) }}>
    @if ('GET' !== $method)
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
