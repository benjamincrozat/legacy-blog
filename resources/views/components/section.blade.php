<section {{ $attributes }}>
    @if (! empty($title))
        <h2 {{ $title->attributes->merge(['class' => 'text-3xl font-bold']) }}>
            {{ $title }}
        </h2>
    @endif

    {{ $slot }}
</section>
