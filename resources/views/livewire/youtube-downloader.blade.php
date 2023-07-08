<div>
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
            <div>{{ $message }}</div>
        @enderror

        <button wire:click="submit" class="px-6 py-3 mt-2 font-medium text-white bg-indigo-400 rounded">
            Convert and download
        </button>
    </form>
</div>
