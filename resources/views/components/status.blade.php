@if (! Route::is('consulting.cto') && (session('status') || request()->convertkit))
    <div
        {{ $attributes->merge([
            'class' => 'fixed bottom-0 left-0 right-0 z-10',
            'x-init' => 'setTimeout(() => open = false, 5000)',
            'x-data' => '{ open: true }',
            'x-show' => 'open',
            'x-cloak' => true,
        ]) }}
    >
        <div class="container mb-4">
            <div class="bg-gray-800 flex items-center justify-between gap-5 px-5 py-4 rounded-lg shadow-lg text-white">
                <p>
                    @if ('confirmed-subscription' === request()->convertkit)
                        You're all set! Thank you for subscribing!
                    @else
                        {{ session('status') }}
                    @endif
                </p>

                <button class="text-indigo-400" @click="open = false">
                    <span class="sr-only">Close</span>
                    <x-heroicon-o-x-mark class="w-5 h-5 translate-y-[-0.5px]" />
                </button>
            </div>
        </div>
    </div>
@endif
