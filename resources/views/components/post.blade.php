<div {{ $attributes->except('post')->merge(['class' => 'flex items-start gap-6 md:gap-8']) }}>
    <img src="{{ $post->image }}" width="64" height="64" alt="{{ $post->title }}" class="flex-shrink-0 object-cover mt-1 aspect-square" />

    <div class="flex-grow">
        <h3 class="font-bold ">
            <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 underline">{{ $post->title }}</a>
        </h3>

        <p class="mt-2">{{ $post->description }}</p>

        <p class="mt-2 opacity-60">Updated on {{ $post->updated_at->isoFormat('LL') }}</p>
    </div>
</div>
