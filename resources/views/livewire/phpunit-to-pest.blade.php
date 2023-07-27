<div>
    @if ($result)
        <pre class="bg-[#1f2937] text-sm p-4 rounded"><x-torchlight-code language="php">{!! $result !!}</x-torchlight-code></pre>

        <button
            class="table px-6 py-3 mx-auto mt-4 font-bold text-white bg-indigo-400 rounded"
            wire:click="again"
        >
            Convert another test
        </button>
    @else
        <form wire:submit.prevent="convert">
            <label for="source" class="sr-only">Your PHPUnit test.</label>
            <textarea wire:model="code" placeholder="Your PHPUnit test." class="w-full px-4 py-3 placeholder-gray-300 border border-gray-200 rounded resize-none"></textarea>
            <button class="table px-6 py-3 mx-auto mt-2 font-bold text-white rounded bg-emerald-400">Convert</button>
        </form>
    @endif
</div>
