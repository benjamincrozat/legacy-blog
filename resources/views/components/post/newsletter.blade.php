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

    (new Subscribe)->subscribe($validated['email']);

    $this->done = true;
};

?>

@volt
    <aside class="@if (! $done) -mt-3 @endif text-center sm:mx-auto sm:max-w-[480px]">
        @if ($done)
            <x-icon-envelope class="h-24 mx-auto" />
        @else
            <x-icon-envelope-closed class="h-24 mx-auto" />
        @endif

        <p class="mt-4 text-xl font-bold md:text-2xl" x-ref="title">
            @if ($done)
                Done. Check your inbox!
            @else
                I share what I learn, <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">for&nbsp;free</span>.
            @endif
        </p>

        <form
            class="mt-4 md:mt-5"
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
