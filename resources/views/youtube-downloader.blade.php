<x-app
    :title="$format === 'MP4' ? 'Convert and download YouTube videos as MP4 for free' : 'Convert and download YouTube videos as MP3 for free'"
    description="Convert and download your favorite YouTube videos in the {{ $format }} format in every available resolution for free."
>
    <div class="!container prose prose-headings:font-medium prose-headings:md:text-center prose-h3:!text-left prose-h3:!text-base prose-a:text-indigo-400 py-8">
        @if ($format === 'MP4')
            <h1>Convert and download<br class="hidden sm:inline" /> YouTube videos as MP4 for free</h1>
        @else
            <h1>Convert and download<br class="hidden sm:inline" />  YouTube videos as MP3 for free</h1>
        @endif

        <livewire:youtube-downloader :format="$format" />

        <div class="mt-16">
            <h2>How to convert and download a YouTube video to {{ $format }} for free?</h2>

            <p>Converting and downloading a YouTube video in the {{ $format }} format is a straightforward process:</p>

            <ul>
                <li>Visit <a href="https://benjamincrozat.com/youtube-to-{{ strtolower($format) }}">benjamincrozat.com/youtube-to-{{ strtolower($format) }}</a></li>
                <li>Copy and paste the URL of the desired YouTube video. The domain can be <em>youtube.com</em> or <em>youtu.be</em>.</li>
                <li>The links to download your video will appear almost instantly in the {{ $format }} format. You can even download it in the {{ $alt_format }} format.</li>
            </ul>

            <h2>
                Frequently asked questions for<br />
                converting and downloading YouTube videos to {{ $format }}
            </h2>

            <h3>Can I convert and download YouTube videos in MP4 or MP3 for free?</h3>
            <p>Yes, you can convert and download YouTube videos completely for free. This website is monetized through ads, so I will never ask you for a dime.</p>

            <h3>What resolutions are available for converting and downloading videos in the MP4 format?</h3>
            <p>Depending on the resolution of the video you are trying to download, the range goes from 144p to 8K.</p>

            <h3>Does converting and downloading videos in the MP4 format worsen the quality?</h3>
            <p>Nope, the compression algorithm is pretty damn good. If you convert and download your video at a high enough resolution, you will enjoy every second of it in great quality.</p>
        </div>
    </div>

    <footer class="py-4 text-sm text-center text-gray-400 bg-gray-900">
        <p class="container">
            Service created by <a href="{{ route('home') }}" class="text-white underline">Benjamin Crozat</a> as an SEO experiment.
        </p>
    </footer>
</x-app>
