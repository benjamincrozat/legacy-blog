<ul>
    @foreach ($tree as $item)
        <li>
            <a href="#{{ Str::slug($item['value']) }}">{{ $item['value'] }}</a>

            <x-posts.tree :tree="$item['children']" />
        </li>
    @endforeach
</ul>
