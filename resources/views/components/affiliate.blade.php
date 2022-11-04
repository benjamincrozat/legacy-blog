@php
$name = empty($name) ? ['cloudways', 'fathom-analytics', 'kinsta'] : [$name];

shuffle($name);

$name = $name[0];
@endphp

<aside {{ $attributes->merge(['class' => 'border dark:border-gray-800 p-4 rounded']) }}>
    @if ($name === 'cloudways')
        <a href="{{ route('affiliate', 'cloudways') }}?chan={{ $channel }}" target="_blank" rel="nofollow noopener noreferrer">
            <x-icon-cloudways class="flex-shrink-0 w-12 h-12" />
            <span class="sr-only">Cloudways</span>
        </a>

        <div>
            <p>
                <strong class="font-bold dark:text-white">Cloudways</strong> provides <strong class="font-bold dark:text-white">affordable</strong>, <strong class="font-bold dark:text-white">easy-to-use</strong>, and <strong class="font-bold dark:text-white">scalable</strong> web hosting for PHP developers.
            </p>

            <p class="mt-1">
                <a href="{{ route('affiliate', 'cloudways') }}?chan={{ $channel }}" target="_blank" rel="nofollow noopener noreferrer" class="text-indigo-400 underline">
                    @if (now()->lte(Illuminate\Support\Carbon::parse('2022-11-05')->endOfDay()))
                        Get started with <strong class="font-bold dark:text-indigo-300">30% off</strong> for 3 months with code <strong class="font-bold italic">TREAT22</strong>.
                    @else
                        Get started with a <strong class="font-bold dark:text-indigo-300">3-day free trial</strong> without credit card.
                    @endif
                </a>
            </p>
        </div>
    @elseif ($name === 'fathom-analytics')
        <a href="{{ route('affiliate', 'fathom-analytics') }}" target="_blank" rel="nofollow noopener noreferrer">
            <x-icon-fathom-analytics class="flex-shrink-0 h-12" />
            <span class="sr-only">Fathom Analytics</span>
        </a>

        <div>
            <p>
                <strong class="font-bold dark:text-white">Fathom Analytics</strong> is a privacy-first analytics tool that can <strong class="font-bold dark:text-white">bypass ad blockers</strong>.
            </p>

            <p class="mt-1">
                <a href="{{ route('affiliate', 'fathom-analytics') }}" target="_blank" rel="nofollow noopener noreferrer" class="text-indigo-400 underline">
                    Get started with a <strong class="font-bold dark:text-indigo-300">7-day trial & $10&nbsp;discount</strong>
                </a>
            </p>
        </div>
    @elseif ($name === 'kinsta')
        <a href="{{ route('affiliate', 'kinsta') }}" target="_blank" rel="nofollow noopener noreferrer">
            <x-icon-kinsta class="flex-shrink-0 h-4" />
            <span class="sr-only">Kinsta</span>
        </a>

        <div>
            <p>
                <strong class="font-bold dark:text-white">Focus on writing</strong>, promote your business, and <strong class="font-bold dark:text-white">let Kinsta manage WordPress</strong>.
            </p>

            <p class="mt-1">
                <a href="{{ route('affiliate', 'kinsta') }}" target="_blank" rel="nofollow noopener noreferrer" class="text-indigo-400 underline">
                    Get started with <strong class="font-bold dark:text-indigo-300">2 months free</strong>.
                </a>
            </p>
        </div>
    @endif
</aside>
