<aside {{ $attributes->merge(['class' => 'container flex flex-wrap sm:flex-nowrap items-center justify-between gap-4 sm:gap-8 mt-8']) }}>
    <div class="order-2 sm:order-none">
        <p class="font-semibold text-xl">
            Article written by {{ $name }}
        </p>

        <div class="content !leading-normal">
            {!! $description !!}
        </div>
    </div>

    <img src="https://www.gravatar.com/avatar/{{ md5($email) }}?s=192" width="96" height="96" alt="{{ $name }}" class="sm:-translate-y-2 flex-shrink-0 w-16 h-16 sm:w-24 sm:h-24 order-1 sm:order-none rounded-full" />
</aside>
