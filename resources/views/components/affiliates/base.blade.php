<div {{ $attributes->merge(['class' => 'border mt-8 p-4 rounded']) }}>
    <div class="md:max-w-screen-md mx-auto">
        {{ $slot }}
    </div>
</div>
