<a {{ $attributes->merge([
    'wire:navigate' => '',
    'href' => '/',
]) }}>
    <span class="sr-only">{{ config('app.name') }}</span>
    <x-icon-logo class="w-8 h-8 transition-transform duration-[400ms] ease-in-out fill-current group hover:rotate-45 md:w-10 md:h-10" />
</a>
