<?php

namespace App\Models\Presenters;

use App\Str;
use App\Tree;
use Spatie\Url\Url;

class PostPresenter extends BasePresenter
{
    public function thumbnail() : string
    {
        if (! Str::startsWith($this->model->image, 'https://res.cloudinary.com')) {
            return $this->model->image;
        }

        return str_replace('/upload', '/upload/dpr_auto,f_auto,q_auto,w_256', $this->model->image);
    }

    public function image() : ?string
    {
        $media = $this->model->getFirstMedia('image');

        if (app()->isProduction() && ! $media) {
            return $this->fallbackImage();
        } elseif (! $media) {
            return 'https://via.placeholder.com/640x480.png/003344?text=Image%20not%20set.';
        }

        return $media->getAvailableFullUrl(['optimized']);
    }

    public function imagePreview() : ?string
    {
        $media = $this->model->getFirstMedia('image');

        if (app()->isProduction() && ! $media) {
            return $this->fallbackImage();
        } elseif (! $media) {
            return 'https://via.placeholder.com/300x300.png/003344?text=Image%20not%20set.';
        }

        return $media->getAvailableFullUrl(['preview']);
    }

    public function fallbackImage() : string
    {
        return 'https://i.useflipp.com/gw6mxpkgy4v8.png?watermark=useflipp.com&title=' . urlencode($this->model->title ?? '') . '&body=' . urlencode($this->model->description ?? '');
    }

    public function tree() : array
    {
        return (new Tree)->build($this->content());
    }

    public function content() : string
    {
        return $this->renderAsMarkdown('content', $this->model->content);
    }

    public function teaser() : string
    {
        return $this->renderAsMarkdown('teaser', $this->model->teaser);
    }

    public function communityLinkDomain() : string
    {
        return str_replace('www.', '', Url::fromString($this->model->community_link)->getHost());
    }

    public function lastUpdated() : string
    {
        return ($this->model->manually_updated_at ?? $this->model->created_at)->isoFormat('LL');
    }
}
