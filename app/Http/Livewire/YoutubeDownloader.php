<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class YoutubeDownloader extends Component
{
    public $url;

    protected $rules = [
        'url' => ['required', 'url'],
    ];

    public function submit() : void
    {
        $options = (new \YouTube\YouTubeDownloader)
            ->getDownloadLinks($this->url);

        dump($options);
    }

    public function updated($name) : void
    {
        $this->validateOnly($name);
    }

    public function render() : View
    {
        return view('livewire.youtube-downloader');
    }
}
