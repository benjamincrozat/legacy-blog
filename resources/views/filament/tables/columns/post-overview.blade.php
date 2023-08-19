<div class="px-3 py-4" style="padding-right: 1.75rem">
    <div class="flex items-center gap-4">
        <img src="{{ $getRecord()->image }}" style="width: 48px; height: 48px" class="flex-shrink-0 object-cover rounded-full aspect-square" />

        <div>
            <div class="font-medium">{{ $getRecord()->title }}</div>
            <div class="text-sm text-gray-600">{{ $getRecord()->slug }}</div>
        </div>
    </div>
</div>
