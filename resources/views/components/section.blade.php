<section {{ $attributes }}>
    @if (! empty($title))
        <{{ $title->attributes->get('tag', 'h2') }} {{ $title->attributes->merge(['class' => 'text-2xl/tight md:text-3xl/tight font-bold']) }}>
            {{ $title }}
        </{{ $title->attributes->get('tag', 'h2') }}>
    @endif

    {{ $slot }}
</section>
