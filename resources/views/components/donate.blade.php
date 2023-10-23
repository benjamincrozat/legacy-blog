<x-section {{ $attributes->merge([
    'class' => 'scroll-mt-8',
]) }}>
    <x-slot:title class="text-center">
        Contribute to the blog
    </x-slot:title>

    <x-prose class="mt-8">
        <x-icon-donate class="float-right w-32 h-32 mt-1 mb-8 ml-8" />

        <p><strong>If you like the content I make, why not consider a monthly donation? Or a one-time payment, it's up to you!</strong></p>

        <p>I will never ask people to pay for content. But I'm also trying to work full-time on the blog and bring the full vision to life. <a href="{{ route('sponsors') }}#roadmap">Learn more</a> about my plans.</p>

        <x-button class="mt-2 text-white bg-blue-600">Donate</x-button>

        <p class="text-xs">(If you have a successful business you want to promote, <a wire:nevigate.hover href="{{ route('media-kit') }}">I sell sponsorships</a> too!)</p>
    </x-prose>
</x-section>
