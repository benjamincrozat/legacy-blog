<div class="px-3 py-4 text-sm" style="padding-right: 1.75rem">
    <div class="flex items-center gap-4">
        <img src="{{ $getRecord()->image }}" style="width: 2.5rem; height: 2.5rem" class="flex-shrink-0 object-cover rounded-full aspect-square" />

        <div>
            <div class="font-medium">{{ $getRecord()->title }}</div>
            <div class="text-gray-600">{{ $getRecord()->slug }}</div>
        </div>
    </div>
</div>
