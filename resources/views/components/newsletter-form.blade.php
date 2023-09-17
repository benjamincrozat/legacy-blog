<?php

use App\Actions\Subscribe;

use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state([
    'email' => '',
    'done' => false,
]);

rules(['email' => 'required|email']);

$subscribe = function () {
    if ($this->done) {
        return;
    }

    $validated = $this->validate();

    app(Subscribe::class)->subscribe($validated['email']);

    $this->done = true;
};

?>

@volt('newsletter-form')
    <aside id="newsletter" class="text-center">
        @if ($done)
            <x-icon-envelope class="h-24 mx-auto" />
        @else
            <x-icon-envelope-closed class="h-24 mx-auto" />
        @endif

        <p
            @if (request()->routeIs('home'))
                class="mt-6 text-2xl font-bold md:mt-8 md:text-3xl lg:text-4xl xl:text-5xl"
            @else
                class="mt-4 text-xl font-bold md:mt-6 md:text-2xl"
            @endif
            x-ref="title"
        >
            @if ($done)
                Done. Check your inbox!
            @else
                I share what I learn, <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">for&nbsp;free</span>.
            @endif
        </p>

        <form
            class="sm:max-w-[480px] sm:mx-auto mt-4 md:mt-6"
            @submit.prevent="$wire.subscribe(); $refs.button.textContent = 'Subscribing…'; $refs.title.textContent = 'Getting everything ready…'"
        >
            @csrf

            <input
                type="text"
                id="email"
                wire:model="email"
                placeholder="johndoe@example.com"
                required
                @if ($done) disabled @endif
                class="w-full disabled:ring-1 disabled:ring-emerald-400 px-[.85rem] placeholder-gray-300 h-[44px] border-0 rounded shadow shadow-black/5 disabled:text-emerald-400 disabled:shadow-none transition-colors duration-500"
            />

            <button
                class="bg-indigo-400 shadow-lg shadow-blue-700/20 h-[44px] font-bold rounded mt-2 px-8 text-white transition-colors duration-500
                @if ($done) disabled:shadow-none disabled:bg-emerald-400 @endif"
                @if ($done) disabled @endif
                x-ref="button"
            >
                @if ($done)
                    Thank you!
                @else
                    Join 400+ developers
                @endif
            </button>
        </form>

        @error('email')
            <p class="mt-4 text-center text-red-400">
                {{ $message }}
            </p>
        @enderror
    </aside>
@endvolt