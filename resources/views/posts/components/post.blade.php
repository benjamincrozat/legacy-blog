<article {{ $attributes->except('highlights', 'post') }}>
    @if ($post->promotes_affiliate_links)
        @if (empty($barebones))
            <div class="container mb-4 sm:mb-3 md:mb-2 sm:text-lg md:text-xl">
                from <a href="{{ $post->user->twitter_url }}" target="_blank" rel="nofollow noopener noreferrer" class="font-normal underline">{{ $post->user->name }}</a>
            </div>
        @endif

        <div class="container flex items-center justify-between gap-8">
            <h1 class="text-3xl font-thin md:text-5xl dark:text-white">
                {{ $post->title }}
            </h1>

            <img src="https://www.gravatar.com/avatar/{{ md5($post->user->email) }}?s=192" width="96" height="96" alt="{{ $post->user->name }}" class="flex-shrink-0 w-16 h-16 -translate-y-px rounded-full sm:w-24 sm:h-24" />
        </div>
    @else
        <h1 class="container text-3xl font-thin md:text-5xl dark:text-white">
            {{ $post->title }}
        </h1>

        @if (empty($barebones))
            <x-posts::metadata
                :email="$post->user->email"
                :name="$post->user->name"
                :modified-at="$post->modified_at ?? $post->created_at"
                :twitter-url="$post->user->twitter_url"
                class="container mt-4"
            />
        @endif
    @endif

    @if (empty($barebones))
        <x-posts::newsletter
            :promotes-affiliate-links="$post->promotes_affiliate_links"
            class="container mt-10 sm:max-w-screen-xs"
        />
    @endif

    @if ($post->introduction)
        <div class="!container content mt-8">
            {!! $post->rendered_introduction !!}
        </div>
    @endif

    @if ($post->promotes_affiliate_links && $highlights->isNotEmpty())
        <div class="container mt-8">
            <div class="grid sm:grid-cols-2 @if ($highlights->count() > 2) md:grid-cols-3 @endif place-items-center gap-4">
                @foreach ($highlights as $highlight)
                    <x-posts::affiliate-highlight
                        :highlight="$highlight"
                        class="h-full col-span-1"
                    />
                @endforeach
            </div>

            <p class="mt-4 text-xs text-center opacity-75">
                This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal. @if ($highlights->count() > 1) <br class="hidden md:inline" /> @endif
                I only promote products I've personally used and stand behind.
            </p>
        </div>
    @endif

    @if (empty($barebones))
        <x-posts::tree
            :tree="$post->tree"
            class="container mt-8"
        />
    @endif

    @if (! $post->promotes_affiliate_links && $post->image)
        <div class="container text-center">
            <img src="{{ $post->image }}" width="1280" height="720" alt="{{ $post->title }}" class="inline object-cover mt-8 aspect-video" />
        </div>
    @endif

    <div class="!container content mt-8">
        {!! $post->rendered_content !!}
    </div>

    @if ($post->affiliates->isNotEmpty())
        <div class="!container content mt-4">
            <ol>
                @foreach ($post->affiliates as $affiliate)
                    <li>
                        <a href="#{{ $affiliate->slug }}">
                            {{ $affiliate->name }}
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
    @endif

    @foreach ($post->affiliates as $affiliate)
        <div class="!container content">
            <h3 id="{{ $affiliate->slug }}">
                <a href="{{ route('affiliate', $affiliate) }}" class="!font-semibold">
                    {{ $affiliate->name }}
                </a>
            </h3>

            @if ($affiliate->take)
                <div class="bg-[#fdfdfe] dark:bg-[#1b2432] mb-8 !mt-4 px-4 py-6 sm:p-8 rounded-xl shadow-xl dark:shadow-none">
                    <div class="not-prose">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('affiliate', $affiliate) }}" class="flex-shrink-0 relative w-[40px] h-[40px] sm:w-[48px] sm:h-[48px]">
                                <img
                                    src="{{ $affiliate->icon }}"
                                    alt="{{ $affiliate->name }}"
                                    class="absolute inset-0 z-10 rounded-md sm:rounded-lg"
                                />

                                <img
                                    loading="lazy"
                                    src="https://www.gravatar.com/avatar/{{ md5($post->user->email) }}"
                                    alt="{{ $post->user->name }}"
                                    class="absolute z-20 w-2/3 rounded-full -bottom-2 -right-2 ring-4 ring-white dark:ring-gray-800"
                                />
                            </a>

                            <div class="font-bold leading-tight sm:text-lg md:text-xl">
                                {{ $post->user->name }}'s take on <a href="{{ route('affiliate', $affiliate) }}" class="underline underline-offset-4">{{ $affiliate->name }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        {!! $affiliate->rendered_take !!}

                        @if ($affiliate->rating)
                            <div class="mt-8 text-center">
                                <div class="text-xl font-semibold sm:text-3xl">
                                    {{ $affiliate->rating }} out of 10
                                </div>

                                <div class="mt-2">
                                    @foreach (range(1, $affiliate->rating) as $i)
                                        <x-heroicon-s-star class="inline w-6 h-6 text-yellow-400 sm:w-8 sm:h-8" />
                                    @endforeach

                                    @if ($affiliate->rating < 10)
                                        @foreach (range(1, 10 - $affiliate->rating) as $i)
                                            <x-heroicon-s-star class="inline w-6 h-6 opacity-10 sm:w-8 sm:h-8" />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($affiliate->annual_discount || $affiliate->guarantee)
                            <table class="w-full">
                                @if ($affiliate->pricing)
                                    <tr>
                                        <th class="pl-0 pr-2 text-right">Pricing</th>
                                        <td class="pl-2 pr-0">{{ $affiliate->pricing }}</td>
                                    </tr>
                                @endif

                                @if ($affiliate->annual_discount)
                                    <tr>
                                        <th class="pl-0 pr-2 text-right">Annual discount</th>
                                        <td class="pl-2 pr-0">{{ $affiliate->annual_discount }}</td>
                                    </tr>
                                @endif

                                @if ($affiliate->guarantee)
                                    <tr>
                                        <th class="pl-0 pr-2 text-right">Guarantee</th>
                                        <td class="pl-2 pr-0">{{ $affiliate->guarantee }}</td>
                                    </tr>
                                @endif
                            </table>
                        @endif
                    </div>

                    <a href="{{ route('affiliate', $affiliate) }}" class="btn-green mt-7">
                        Try {{ $affiliate->name }}
                    </a>
                </div>
            @endif

            @if ($affiliate->content)
                {!! $affiliate->rendered_content !!}
            @endif

            @if ($affiliate->screenshot)
                <a href="{{ route('affiliate', $affiliate) }}">
                    <img src="{{ str_replace('/upload', '/upload/dpr_auto,f_auto,q_auto,w_auto', $affiliate->screenshot) }}" alt="{{ $affiliate->name }}" class="w-full rounded-lg shadow-md aspect-video dark:shadow-none" />
                </a>
            @endif

            @if ($affiliate->key_features)
                <p class="font-bold">Key features:</p>
                {!! $affiliate->rendered_key_features !!}
            @endif

            @if ($affiliate->pros)
                <p class="text-lg font-bold sm:text-xl">
                    Here's what I love about {{ $affiliate->name }}…
                </p>

                {!! $affiliate->rendered_pros !!}
            @endif

            @if ($affiliate->cons)
                <p class="text-lg font-bold sm:text-xl">
                    And what's not so good…
                </p>

                {!! $affiliate->rendered_cons !!}
            @endif

            <a href="{{ route('affiliate', $affiliate) }}" class="mt-8 btn-green">
                Try {{ $affiliate->name }}
            </a>
        </div>
    @endforeach

    @if ($post->conclusion)
        <div class="!container content mt-8">
            {!! $post->rendered_conclusion !!}
        </div>
    @endif
</article>
