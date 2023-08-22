<?php

namespace App\Models\Presenters;

class UserPresenter extends BasePresenter
{
    public function gravatar() : string
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->model->email);
    }

    public function description() : string
    {
        return $this->renderAsMarkdown('description', $this->model->description);
    }
}
