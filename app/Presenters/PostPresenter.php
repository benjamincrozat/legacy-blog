<?php

namespace App\Presenters;

use App\Str;
use App\Tree;
use Spatie\Url\Url;
use Illuminate\Support\Carbon;

class PostPresenter extends BasePresenter
{
    public function image() : ?string
    {
        return $this->model->getFirstMedia('image')?->getAvailableFullUrl(['medium']);
    }

    public function imagePreview() : ?string
    {
        return $this->model->getFirstMedia('image')?->getAvailableFullUrl(['preview']);
    }

    public function tree() : array
    {
        return (new Tree)->build($this->content());
    }

    public function content() : string
    {
        return Str::markdown($this->model->content ?? '');
    }

    public function teaser() : string
    {
        return Str::markdown($this->model->teaser ?? '');
    }

    public function communityLinkDomain() : string
    {
        return str_replace('www.', '', Url::fromString($this->model->community_link)->getHost());
    }

    public function lastUpdated() : string
    {
        $date = $this->model->manually_updated_at
            ?? $this->model->published_at
            ?? $this->model->created_at;

        if (is_string($date)) {
            $date = Carbon::parse($date);
        }

        return $date->isoFormat('LL');
    }
}
