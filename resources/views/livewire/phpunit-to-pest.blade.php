<div>
    @if ($result)
        <pre class="p-4 text-sm rounded bg-gray-950/50"><x-torchlight-code language="php">{!! $result !!}</x-torchlight-code></pre>

        <button
            class="table px-6 py-3 mx-auto mt-4 font-bold text-white rounded bg-gray-950/75"
            wire:click="again"
        >
            Convert another test to Pest
        </button>
    @else
        <form wire:submit.prevent="convert">
            <label for="source" class="sr-only">
                Test
            </label>

            <textarea
                wire:model="code"
                placeholder="{!! "&lt;?php\n\nnamespace Tests\Unit;\n\nuse PHPUnit\Framework\TestCase;\n\nclass ExampleTest extends TestCase\n{\n   public function test_that_true_is_true(): void\n   {\n       \$this->assertTrue(true);\n   }\n}" !!}"
                class="w-full px-4 py-3 min-h-[350px] md:min-h-[300px] font-mono text-sm bg-transparent border-0 rounded resize-none placeholder-gray-700/50 focus:ring-teal-400 bg-gradient-to-r from-gray-800/30 to-gray-800/50"
                x-autosize
            ></textarea>

            <button
                class="table px-6 py-3 mx-auto mt-2 font-bold text-white rounded bg-gradient-to-r from-emerald-400 via-blue-400 to-pink-400"
                style="text-shadow: 1px 1px 1px rgb(0 0 0 / 10%)"
            >
                Convert to Pest
            </button>
        </form>
    @endif
</div>
