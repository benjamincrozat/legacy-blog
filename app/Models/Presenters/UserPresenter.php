<?php

namespace App\Models\Presenters;

use App\Str;

class UserPresenter extends BasePresenter
{
    public function gravatar() : string
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->model->email);
    }

    public function description() : string
    {
        return Str::markdown($this->model->description ?? '');
    }
}
