<ul>
    @foreach ($branches as $branch)
        <li>
            <a href="#{{ Str::slug($branch['value']) }}">{{ $branch['value'] }}</a>

            <x-post.tree.branch :branches="$branch['children']" />
        </li>
    @endforeach
</ul>
