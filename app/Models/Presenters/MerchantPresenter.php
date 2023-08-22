<?php

namespace App\Models\Presenters;

class MerchantPresenter extends BasePresenter
{
    public function take() : string
    {
        return $this->renderAsMarkdown('take', $this->model->take);
    }

    public function keyFeatures() : string
    {
        return $this->renderAsMarkdown('key_features', $this->model->key_features);
    }

    public function content() : string
    {
        return $this->renderAsMarkdown('content', $this->model->content);
    }

    public function pros() : string
    {
        return $this->renderAsMarkdown('pros', $this->model->pros);
    }

    public function cons() : string
    {
        return $this->renderAsMarkdown('cons', $this->model->cons);
    }
}
