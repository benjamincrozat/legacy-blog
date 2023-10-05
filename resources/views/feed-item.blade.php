@if ($post->presenter()->image())
    <img loading="lazy" src="{{ $post->presenter()->image() }}" alt="{{ $post->title }}" />
@endif

@if ($post->teaser)
    {!! $post->presenter()->teaser() !!}
@else
    {{ $post->description }}
@endif
