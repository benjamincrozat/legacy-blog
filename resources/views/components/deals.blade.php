<section {{ $attributes }}>
    <h4 class="font-bold px-4 sm:px-0 text-center text-xl">
        Latest deals
    </h4>

    @if ($deals->isNotEmpty())
        <div class="grid md:grid-cols-2 gap-4 mt-8">
            @foreach ($deals as $deal)
                <x-deal :deal="$deal" />
            @endforeach
        </div>
    @endif
</section>
