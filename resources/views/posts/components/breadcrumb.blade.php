@if ($promotesAffiliateLinks)
    <x-breadcrumb {{ $attributes }}>
        <x-breadcrumb-item class="truncate">
            {{ $slot }}
        </x-breadcrumb-item>
    </x-breadcrumb>
@endif
