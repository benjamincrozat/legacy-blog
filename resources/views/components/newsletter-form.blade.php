<?php

use App\Actions\Subscribe;

use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state([
    'done' => false,
    'email' => '',
    'homepage' => request()->routeIs('home'),
]);

rules(['email' => 'required|email']);

$subscribe = function () {
    $validated = $this->validate();

    // app(Subscribe::class)->subscribe($validated['email']);

    $this->dispatch('done', true);
};

?>

@volt('newsletter-form')
    <aside
        id="newsletter"
        class="text-center"
        x-data="{
            button: null,
            done: false,
            homepage: @entangle('homepage'),
            title: null,
        }"
        @subscribing="() => {
            title = 'Getting everything ready…'
            button = 'Subscribing…'
        }"
        @done="() => {
            done = true
            title = 'Done. Check your inbox!'
            button = 'Thank you!'
            $refs.field.blur()
        }"
    >
        <x-icon-envelope class="h-24 mx-auto" x-cloak x-show="done" />
        <x-icon-envelope-closed class="h-24 mx-auto" x-show="! done" />

        <p
            class="mt-4 md:mt-6"
            x-bind:class="{
                'text-2xl/snug font-bold md:text-3xl/snug lg:text-4xl/snug xl:text-5xl/snug': homepage,
                'text-xl/none font-bold md:text-2xl/none': ! homepage,
            }"
            x-html="title || $el.innerHTML"
            x-ref="title"
        >
            I share what I learn, <span class="font-semibold text-transparent bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text">for&nbsp;free</span>.
        </p>

        <form
            class="sm:max-w-[480px] sm:mx-auto mt-4 md:mt-6"
            @submit.prevent="$wire.subscribe(); $dispatch('subscribing')"
        >
            @csrf

            <input
                type="email"
                id="email"
                wire:model="email"
                placeholder="johndoe@example.com"
                required
                :disabled="done"
                x-ref="field"
                class="w-full disabled:ring-1 disabled:ring-emerald-400 px-[.85rem] placeholder-gray-300 h-[44px] border-0 rounded shadow shadow-black/5 disabled:text-emerald-400 disabled:shadow-none transition-colors duration-500"
            />

            <button
                class="bg-indigo-400 shadow-lg shadow-blue-700/20 h-[44px] font-bold rounded mt-2 px-8 text-white transition-colors duration-500"
                x-bind:class="{ 'disabled:shadow-none disabled:bg-emerald-400': done, }"
                :disabled="done"
                x-ref="button"
                x-text="button || $el.textContent"
            >
                Join 400+ developers
            </button>
        </form>

        @error('email')
            <p class="mt-4 text-center text-red-400">
                {{ $message }}
            </p>
        @enderror
    </aside>
@endvolt
