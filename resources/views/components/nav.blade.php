<nav {{ $attributes }}>
    <ul class="flex items-center justify-center font-normal gap-8 text-xs">
        <li>
            <a href="{{ route('home') }}" class="hover:opacity-50 tracking-widest transition-opacity uppercase {{ $highlightClasses }}">
                Hire me!
            </a>
        </li>

        <li>
            <a href="{{ route('posts.index') }}" class="hover:opacity-50 tracking-widest transition-opacity uppercase">
                Blog
            </a>
        </li>
    </ul>
</nav>
