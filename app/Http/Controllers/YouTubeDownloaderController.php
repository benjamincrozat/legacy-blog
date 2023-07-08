<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class YouTubeDownloaderController extends Controller
{
    public function __invoke(string $format) : View
    {
        return view('youtube-downloader', [
            'title' => 'mp4' === $format
                ? 'Convert and download YouTube videos as MP4 for free'
                : 'Convert and download YouTube videos as MP3 for free',
            'format' => strtoupper($format),
            'alt_format' => 'mp4' === $format ? 'MP3' : 'MP4',
        ]);
    }
}
