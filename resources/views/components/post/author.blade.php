<aside>
    <x-prose>
        <img
            loading="lazy"
            src="{{ $author->presenter()->gravatar(256) }}"
            alt="{{ $author->name }}"
            class="float-right w-[96px] md:w-[128px] h-[96px] md:h-[128px] mt-2 mb-8 ml-8 rounded-full"
        />

        <h3 class="text-2xl">
            Written by {{ $author->name }}
        </h3>

        {!! $author->presenter()->description() !!}

        <p>Follow me on:</p>

        <ul>
            <li>
                <a
                    href="https://github.com/{{ $author->github_handle }}"
                    target="_blank"
                    rel="nofollow noopener"
                >
                    GitHub
                </a>
            </li>

            <li>
                <a
                    href="https://x.com/{{ $author->x_handle }}"
                    target="_blank"
                    rel="nofollow noopener"
                >
                    X
                </a>
            </li>
        </ul>
    </x-prose>
</aside>
