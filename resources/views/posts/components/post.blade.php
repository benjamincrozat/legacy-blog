<article {{ $attributes }}>
    @if ($post->promotes_affiliate_links)
        <div class="container mt-4 text-lg md:text-xl">
            from <strong class="font-semibold">{{ $post->user->name }}</strong>
        </div>

        <div class="container flex items-center justify-between gap-8">
            <h1 class="font-thin text-3xl md:text-5xl dark:text-white">
                {{ $post->title }}
            </h1>

            <img src="https://www.gravatar.com/avatar/{{ md5($post->user->email) }}?s=192" width="96" height="96" alt="{{ $post->user->name }}" class="flex-shrink-0 w-16 h-16 sm:w-24 sm:h-24 rounded-full" />
        </div>
    @else
        <h1 class="@if ($post->ai) before:content-['AI-generated:'] before:text-indigo-400 @endif container font-thin text-3xl md:text-5xl dark:text-white">
            {{ $post->title }}
        </h1>

        <x-posts::metadata
            :email="$post->user->email"
            :name="$post->user->name"
            :modified-at="$post->modified_at ?? $post->created_at"
            class="container mt-4"
        />
    @endif

    <x-posts::newsletter
        :promotes-affiliate-links="$post->promotes_affiliate_links"
        :subscribers-count="$subscribersCount"
        class="container sm:max-w-screen-xs mt-10"
    />

    @if ($post->introduction)
        <div class="!container content mt-8">
            {!! $post->rendered_introduction !!}
        </div>
    @endif

    @if ($post->promotes_affiliate_links && $highlights->isNotEmpty())
        <div class="container mt-8">
            <div class="grid sm:grid-cols-2 @if ($highlights->count() > 2) md:grid-cols-3 @endif place-items-center gap-4 text-center">
                @foreach ($highlights as $highlight)
                    <x-posts::affiliate-highlight
                        :highlight="$highlight"
                        class="col-span-1 h-full"
                    />
                @endforeach
            </div>

            <p class="mt-4 opacity-75 text-center text-xs">
                This article uses affiliate links, which can compensate me at no cost to you if you decide to pursue a deal. @if ($highlights->count() > 1) <br class="hidden md:inline" /> @endif
                I only promote products I've personally used and stand behind.
            </p>
        </div>
    @endif

    @if (empty($barebone))
        <x-posts::tree
            :tree="$post->tree"
            class="container mt-8"
        />
    @endif

    @if (! $post->promotes_affiliate_links && $post->image)
        <div class="container text-center">
            <img src="{{ $post->image }}" width="1280" height="720" alt="{{ $post->title }}" class="aspect-video inline mt-8 object-cover" />
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
                                    class="absolute inset-0 rounded-md sm:rounded-lg z-10"
                                />

                                <img
                                    loading="lazy"
                                    src="https://www.gravatar.com/avatar/{{ md5($post->user->email) }}"
                                    alt="{{ $post->user->name }}"
                                    class="absolute -bottom-2 -right-2 ring-4 ring-white dark:ring-gray-800 rounded-full w-2/3 z-20"
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
                                <div class="font-semibold text-xl sm:text-3xl">
                                    {{ $affiliate->rating }} out of 10
                                </div>

                                <div class="mt-2">
                                    @foreach (range(1, $affiliate->rating) as $i)
                                        <x-heroicon-s-star class="inline text-yellow-400 w-6 sm:w-8 h-6 sm:h-8" />
                                    @endforeach

                                    @if ($affiliate->rating < 10)
                                        @foreach (range(1, 10 - $affiliate->rating) as $i)
                                            <x-heroicon-s-star class="inline opacity-10 w-6 sm:w-8 h-6 sm:h-8" />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($affiliate->annual_discount || $affiliate->guarantee)
                            <table class="w-full">
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
                    <img src="{{ str_replace('/upload', '/upload/dpr_auto,f_auto,q_auto,w_auto', $affiliate->screenshot) }}" alt="{{ $affiliate->name }}" class="aspect-video rounded-lg shadow-md dark:shadow-none w-full" />
                </a>
            @endif

            @if ($affiliate->pricing)
                <p class="font-bold">Pricing:</p>
                {!! $affiliate->pricing !!}
            @endif

            @if ($affiliate->key_features)
                <p class="font-bold">Key features:</p>
                {!! $affiliate->rendered_key_features !!}
            @endif

            @if ($affiliate->pros)
                <p class="font-bold">What I like:</p>
                {!! $affiliate->rendered_pros !!}
            @endif

            @if ($affiliate->cons)
                <p class="font-bold">What I dislike:</h4>
                {!! $affiliate->rendered_cons !!}
            @endif

            <a href="{{ route('affiliate', $affiliate) }}" class="btn-green mt-8">
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
