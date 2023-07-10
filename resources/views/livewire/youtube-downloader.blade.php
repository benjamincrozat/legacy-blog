<div>
    @if ($this->options)
        @dump($this->options)
    @endif

    <form wire:submit.prevent="submit" class="mt-8 text-center">
        <div>
            <label for="url" class="sr-only">
                URL
            </label>

            <input
                type="url"
                wire:model="url"
                id="url"
                placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ or https://youtu.be/dQw4w9WgXcQ"
                required
                class="w-full px-4 py-3 placeholder-gray-300 border-gray-300 rounded"
            />
        </div>

        @error('url')
            <div class="mt-1 mb-2 text-red-400">{{ $message }}</div>
        @enderror

        <button
            class="px-6 py-3 mt-2 font-medium text-white transition-colors bg-indigo-400 rounded disabled:bg-gray-100 disabled:text-gray-300"
        >
            Convert and download
        </button>
    </form>
</div>
