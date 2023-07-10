<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class YouTubeDownloaderController extends Controller
{
    public function __invoke(string $format) : View
    {
        return view('youtube-downloader', [
            'format' => strtoupper($format),
            'alt_format' => 'mp4' === $format ? 'MP3' : 'MP4',
        ]);
    }
}
