<section {{ $attributes }}>
    <h4 class="font-bold px-4 sm:px-0 text-center text-xl">
        Latest deals
    </h4>

    @if ($deals->isNotEmpty())
        <div class="flex md:grid md:grid-cols-2 gap-4 mt-8 px-4 md:px-0 overflow-x-scroll md:overflow-x-visible snap-x md:snap-none snap-mandatory">
            @foreach ($deals as $deal)
                <x-deal :deal="$deal" class="flex-shrink-0 snap-start sm:snap-center md:snap-normal scroll-ml-4 md:scroll-ml-0 w-[90%] sm:w-[70%] md:w-auto" />
            @endforeach
        </div>
    @endif
</section>
