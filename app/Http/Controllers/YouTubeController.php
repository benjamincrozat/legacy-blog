<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    public function __invoke(Request $request) : View
    {
        return view('youtube', [
            'title' => 'youtube-to-mp4' === $request->path()
                ? 'Convert and download YouTube videos as MP4 for free'
                : 'Convert and download YouTube videos as MP3 for free',
            'format' => 'youtube-to-mp4' === $request->path() ? 'MP4' : 'MP3',
            'alt_format' => 'youtube-to-mp4' === $request->path() ? 'MP3' : 'MP4',
        ]);
    }
}
