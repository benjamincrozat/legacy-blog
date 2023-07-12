@if ($recommended->isNotEmpty())
    <div {{ $attributes->except('recommended') }}>
        <div class="text-xl font-semibold text-center">
            Recommended
        </div>

        <div class="grid gap-4 mt-8 md:grid-cols-2 sm:gap-8">
            @foreach ($recommended as $post)
                <x-post :post="$post" />
            @endforeach
        </div>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3461630254419592" crossorigin="anonymous"></script>
        <ins class="mt-16 adsbygoogle empty:mt-0" style="display:block" data-ad-format="autorelaxed" data-ad-client="ca-pub-3461630254419592" data-ad-slot="4616088468"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({})</script>
    </div>
@endif
