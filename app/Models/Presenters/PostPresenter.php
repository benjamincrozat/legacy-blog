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
        return $this->model->getFirstMedia('image')?->getAvailableFullUrl(['optimized']) ?? 'https://i.useflipp.com/gw6mxpkgy4v8.png?watermark=useflipp.com&title=' . urlencode($this->model->title ?? '') . '&body=' . urlencode($this->model->description ?? '');
    }

    public function imagePreview() : ?string
    {
        return $this->model->getFirstMedia('image')?->getAvailableFullUrl(['preview']) ?? 'https://i.useflipp.com/gw6mxpkgy4v8.png?watermark=useflipp.com&title=' . urlencode($this->model->title ?? '') . '&body=' . urlencode($this->model->description ?? '');
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
