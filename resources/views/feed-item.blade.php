<img loading="lazy" src="{{ $post->presenter()->image() }}" alt="{{ $post->title }}" />

@if ($post->teaser)
    {!! $post->presenter()->teaser() !!}
@else
    {{ $post->description }}
@endif
