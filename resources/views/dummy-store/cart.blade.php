<?php

use function Livewire\Volt\state;

state('count', fn () => cache()->get(sha1(request()->ip()) . '_count', 0));

$remove = function () {
    if ($this->count > 0) {
        cache()->put(sha1(request()->ip()) . '_count', --$this->count);
    }
};

?>

<x-app
    :hide-navigation="true"
    :hide-footer="true"
    class="!bg-gray-50 !text-gray-600"
>
    @volt
        <div class="container py-8">
            <div>
                <a wire:navigate.hover href="{{ route('dummy-store.index') }}">
                    ← Back
                </a>
            </div>

            @if ($count)
                <div class="grid gap-8 mt-8">
                    @foreach (range(1, cache()->get(sha1(request()->ip()).'_count')) as $item)
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <img loading="lazy" src="https://via.placeholder.com/256x256.png/f3f4f6" width="128" height="128" />

                                <div>
                                    <div>{{ fake()->sentence(2) }}</div>
                                    <div class="text-2xl font-bold">${{ rand(10, 100) }}</div>
                                </div>
                            </div>

                            <button
                                class="px-3 py-2 text-sm font-bold text-white bg-red-400 rounded"
                                wire:click="remove"
                            >
                                Remove
                            </button>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="mt-16 text-3xl font-light text-center">Your cart is empty.</p>
            @endif

            <footer class="mt-16 text-center">
                Demo created by <a href="{{ route('home') }}" class="font-bold underline">Benjamin Crozat</a> for Laracasts.
            </footer>
        </div>
    @endvolt
</x-app>
