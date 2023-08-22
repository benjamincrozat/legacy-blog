<?php

namespace App\Models\Presenters;

use App\Tree;
use Spatie\Url\Url;

class PostPresenter extends BasePresenter
{
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
        return ($this->model->updated_at ?? $this->model->created_at)->isoFormat('LL');
    }
}
