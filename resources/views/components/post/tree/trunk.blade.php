@if (! empty($tree))
    <p class="font-bold">Table of contents:</p>

    <x-post.tree.branch :branches="$tree" />
@endif
