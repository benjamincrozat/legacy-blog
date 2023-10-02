<?php

namespace App\Presenters;

use App\Str;

class UserPresenter extends BasePresenter
{
    public function gravatar(int $size = 128) : string
    {
        $md5Email = md5($this->model->email);

        return "https://www.gravatar.com/avatar/$md5Email?s=$size";
    }

    public function description() : string
    {
        return Str::markdown($this->model->description ?? '');
    }
}
