<div {{ $attributes->merge(['class' => 'bg-gray-900']) }}>
    <footer class="container py-8 text-gray-400 text-sm" x-intersect="window.fathom?.trackGoal('08VVENFW', 0)">
        <div class="flex items-center justify-between">
            <a href="{{ route('home') }}" class="translate-y-[2px] tracking-widest uppercase">
                Benjamin Crozat
            </a>

            <ul class="flex items-center gap-2 text-gray-300">
                <li>
                    <a href="https://github.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-white transition-all" @click="window.fathom?.trackGoal('COYELHY0', 0);">
                        <span class="sr-only">GitHub</span>
                        <x-icon-github class="fill-current h-8" />
                    </a>
                </li>

                <li>
                    <a href="https://www.linkedin.com/in/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-white transition-all" @click="window.fathom?.trackGoal('COYELHY0', 0);">
                        <span class="sr-only">LinkedIn</span>
                        <x-icon-linkedin class="fill-current h-8" />
                    </a>
                </li>

                <li>
                    <a href="https://twitter.com/benjamincrozat" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-white transition-all" @click="window.fathom?.trackGoal('COYELHY0', 0);">
                        <span class="sr-only">Twitter</span>
                        <x-icon-twitter class="fill-current h-8" />
                    </a>
                </li>
            </ul>
        </div>

        <p class="mt-8 text-center">
            Hosting by <a href="https://m.do.co/c/58bbdf89fc72" target="_blank" rel="nofollow noopener noreferrer" class="border-b border-gray-700 text-gray-300 hover:text-white transition-colors">DigitalOcean</a>, analytics by <a href="https://usefathom.com/ref/JTPOCN" target="_blank" rel="nofollow noopener noreferrer" class="border-b border-gray-700 text-gray-300 hover:text-white transition-colors">Fathom&nbsp;Analytics</a> and syntax highlighting by <a href="https://torchlight.dev" target="_blank" rel="nofollow noopener noreferrer" class="border-b border-gray-700 text-gray-300 hover:text-white transition-colors">Torchlight</a>.
        </p>

        <p class="mt-8 text-center text-gray-600 text-xs uppercase">
            © Benjamin Crozat {{ date('Y') }}. All&nbsp;rights&nbsp;reserved.
        </p>
    </footer>
</div>
