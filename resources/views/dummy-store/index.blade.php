<?php

use function Livewire\Volt\on;
use function Livewire\Volt\state;

state([
    'count' => fn () => cache()->get(sha1(request()->ip()) . '_count', 0),
    'done' => false,
]);

on(['product-added-to-cart' => function () {
    cache()->put(sha1(request()->ip()) . '_count', ++$this->count);
}]);

$add = function () {
    $this->dispatch('product-added-to-cart');

    $this->done = true;
};

?>

<x-app
    :hide-navigation="true"
    :hide-footer="true"
    class="!bg-gray-50 !text-gray-600"
>
    <div class="container py-8">
        <div class="text-right">
            @volt
                <a href="{{ route('dummy-store.cart') }}" wire:navigate.hover>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block mr-1 w-6 h-6 translate-y-[-2px]"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>

                    <span class="font-bold">
                        {{ $count }}
                    </span>
                </a>
            @endvolt
        </div>

        <div class="grid grid-cols-3 gap-8 mt-8">
            @foreach (range(1, 9) as $item)
                <div>
                    <img loading="lazy" src="https://via.placeholder.com/512x512.png/f3f4f6" />

                    <div class="flex items-start justify-between mt-4">
                        <div>
                            <div>{{ fake()->sentence(2) }}</div>
                            <div class="text-2xl font-bold">${{ rand(10, 100) }}</div>
                        </div>

                        @volt
                            <button
                                class="px-3 py-2 text-sm font-bold text-white bg-blue-600 rounded disabled:bg-gray-200 disabled:text-gray-400"
                                @if ($done) disabled @endif
                                wire:click="add"
                            >
                                @if ($done)
                                    Added
                                @else
                                    Add
                                @endif
                            </button>
                        @endvolt
                    </div>
                </div>
            @endforeach
        </div>

        <footer class="mt-16 text-center">
            Demo created by <a href="{{ route('home') }}" class="font-bold underline">Benjamin Crozat</a> for Laracasts.
        </footer>
    </div>
</x-app>
