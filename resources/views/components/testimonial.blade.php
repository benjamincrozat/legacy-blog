<div {{ $attributes->merge(['class' => 'bg-gradient-to-r from-gray-200/[.35] to-gray-200/[.15]']) }}>
    <div class="container lg:max-w-screen-md">
        <aside class="py-8 md:flex md:items-center md:gap-8">
            <img loading="lazy" src="{{ $imgUrl }}" width="96" height="96" class="flex-shrink-0 aspect-square w-[96px] order-2 h-[96px] rounded-full mx-auto" alt="{{ $imgAlt }}" />

            <blockquote class="order-1 mt-6 text-xl md:mt-0">
                {{ $slot }}

                <cite class="block mt-8 text-gray-500">
                    @if (empty($authorUrl))
                        {{ $authorName }}
                    @else
                        <a href="{{ $authorUrl }}" class="text-blue-600 underline">{{ $authorName }}</a>
                    @endif

                    <br />

                    {!! $authorDetails !!}
                </cite>
            </blockquote>
        </aside>
    </div>
</div>
