<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use YouTube\DownloadOptions;

class YoutubeDownloader extends Component
{
    public $url;

    protected ?DownloadOptions $options = null;

    protected $rules = [
        'url' => ['required', 'url'],
    ];

    public function submit() : void
    {
        if (! $this->url) {
            return;
        }

        $this->options = (new \YouTube\YouTubeDownloader)
            ->getDownloadLinks($this->url);
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
