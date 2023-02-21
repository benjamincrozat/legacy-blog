<article {{ ($attributes ?? null)?->except('post') }}>
    <h1 class="@if ($post->ai) before:content-['AI-generated:'] before:text-indigo-400 @endif container font-thin text-3xl md:text-5xl dark:text-white">
        {{ $post->title }}
    </h1>

    <x-posts::metadata
        :email="$post->user->email"
        :name="$post->user->name"
        :read-time="empty($attributes) ? 0 : $post->read_time"
        :updated-at="$post->updated_at"
        class="container mt-4"
    />

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

    <x-posts::affiliate-highlights
        :highlights="$post->affiliates->where(app()->isProduction() ? 'pivot.position' : 'position')"
        :promotes-affiliate-links="$post->promotes_affiliate_links"
        class="container mt-8"
    />

    @if (! empty($attributes))
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
                <div class="bg-gradient-to-r from-white/75 dark:from-gray-800/75 to-white/30 dark:to-gray-800/30 my-8 px-4 py-6 sm:p-8 rounded-xl shadow-xl dark:shadow-none">
                    <div class="not-prose">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('affiliate', $affiliate) }}" class="flex-shrink-0">
                                <img
                                    src="{{ $affiliate->icon }}"
                                    alt="{{ $affiliate->name }}"
                                    width="48"
                                    height="48"
                                    class="aspect-square inline rounded-md sm:rounded-lg w-[40px] h-[40px] sm:w-[48px] sm:h-[48px]"
                                />
                            </a>

                            <div class="font-bold leading-tight sm:text-lg md:text-xl">
                                {{ $post->user->name }}'s take on <a href="{{ route('affiliate', $affiliate) }}" class="decoration-indigo-400/50 text-indigo-400 underline underline-offset-4">{{ $affiliate->name }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        {{ $affiliate->take }}

                        @if ($affiliate->rating)
                            <div class="mt-8 text-center">
                                <div class="font-normal text-xl sm:text-3xl">
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
                    <img src="{{ str_replace('/upload', '/upload/dpr_auto,f_auto,q_auto,w_auto', $affiliate->screenshot) }}" alt="{{ $affiliate->name }}" class="aspect-video rounded-lg shadow-md w-full" />
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
