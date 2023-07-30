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
            <label for="source" class="sr-only">
                Your PHPUnit test.
            </label>

            <textarea
                wire:model="code"
                placeholder="{!! "&lt;?php\n\nnamespace Tests\Unit;\n\nuse PHPUnit\Framework\TestCase;\n\nclass ExampleTest extends TestCase\n{\n   public function test_that_true_is_true(): void\n   {\n       \$this->assertTrue(true);\n   }\n}" !!}"
                class="w-full px-4 py-3 min-h-[350px] md:min-h-[300px] font-mono text-sm bg-transparent border-0 rounded resize-none placeholder-gray-700/50 focus:ring-teal-400 bg-gradient-to-r from-gray-800/30 to-gray-800/50"
                x-autosize
            ></textarea>

            <button
                class="table px-6 py-3 mx-auto mt-2 font-bold text-white rounded bg-gradient-to-r from-emerald-400 via-blue-400 to-pink-400"
                style="text-shadow: 1px 1px 3px rgb(0 0 0 / 20%)"
            >
                Convert
            </button>
        </form>
    @endif
</div>
