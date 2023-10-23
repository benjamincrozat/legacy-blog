<?php

use function Livewire\Volt\state;

use Pest\Drift\Converters\CodeConverterFactory;

state([
    'code' => '',
    'result' => '',
]);

$migrate = function () {
    $this->validate([
        'code' => 'required|string|min:3',
    ]);

    $this->result = (new CodeConverterFactory)
        ->codeConverter()
        ->convert($this->code);
};

$again = function () {
    $this->code = '';
    $this->result = '';
};

?>

<div>
    @if ($result)
        <pre class="p-4 font-mono text-sm rounded bg-gray-950/50">{{ $result }}</pre>

        <button
            class="table px-6 py-3 mx-auto mt-4 font-bold text-white rounded bg-gray-950/75"
            wire:click="again"
        >
            Migrate another test to Pest
        </button>
    @else
        <form wire:submit.prevent="migrate">
            <label for="source" class="sr-only">
                Test
            </label>

            <textarea
                wire:model="code"
                placeholder="Your PHPUnit code here…"
                required
                class="w-full px-4 py-3 font-mono text-sm bg-transparent border-0 rounded resize-none placeholder-gray-600 focus:ring-teal-400 bg-gradient-to-r from-gray-800/30 to-gray-800/50 min-h-[30vh]"
            ></textarea>

            <button
                class="table px-6 py-3 mx-auto mt-2 font-bold text-white rounded bg-gradient-to-r from-emerald-400 via-blue-400 to-pink-400"
                style="text-shadow: 1px 1px 1px rgb(0 0 0 / 10%)"
            >
                Migrate to Pest
            </button>
        </form>
    @endif
</div>
