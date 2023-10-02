<?php

namespace App\Presenters;

use App\Tree;

class CategoryPresenter extends BasePresenter
{
    public function tree(string $content) : array
    {
        return (new Tree)->build($content);
    }

    public function primaryColor() : string
    {
        return $this->model->primary_color ?? 'black';
    }

    public function secondaryColor() : string
    {
        return $this->model->secondary_color ?? 'white';
    }
}
