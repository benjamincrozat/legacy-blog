<div {{ $attributes->merge(['class' => 'border dark:border-gray-800 italic not-prose p-4 rounded']) }}>
    <p>
        Before you start reading this article, did you know <strong class="font-bold">@choice(':count person|:count persons', $subscribersCount) subscribed to my newsletter</strong>?
    </p>

    <p class="mt-2">
        <a href="#newsletter" class="border-b border-indigo-400/50 font-bold text-indigo-400">Join them and enjoy free content</a> about the art of crafting websites!
    </p>
</div>
