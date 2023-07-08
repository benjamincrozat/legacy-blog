@empty($funnel)
    <x-announcement />
@endempty

<div {{ $attributes->merge(['class' => 'container flex items-center justify-between'])}}>
    <x-logo />
    <x-search-btn />
</div>
