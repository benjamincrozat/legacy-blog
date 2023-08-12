<a href="{{ $link }}" target="_blank" class="block text-gray-600 bg-gradient-to-r from-gray-100 dark:from-gray-900 to-gray-200/[.65] dark:to-gray-800/50 font-medium leading-tight text-sm dark:text-white">
    <div class="container flex items-center justify-between gap-4 py-4 ">
        <div>
            <p>“{{ $slot }}”</p>

            <p class="mt-2 font-medium text-blue-400">
                {{ $cta }}
            </p>
        </div>

        <img
            loading="lazy"
            src="https://www.gravatar.com/avatar/{{ md5('benjamincrozat@me.com') }}?s=128"
            width="48"
            height="48"
            alt="Benjamin Crozat"
            class="flex-shrink-0 w-[48px] h-[48px] md:w-[64px] md:h-[64px] rounded-full"
        />
    </div>
</a>
