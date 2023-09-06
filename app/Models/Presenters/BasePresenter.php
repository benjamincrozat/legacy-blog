<?php

namespace App\Models\Presenters;

use App\Str;
use Illuminate\Database\Eloquent\Model;

abstract class BasePresenter
{
    public function __construct(
        public Model $model
    ) {
    }

    protected function renderAsMarkdown(string $key, ?string $value) : string
    {
        return (string) cache()->rememberForever(
            $this->getRenderCacheKey($key, $value),
            fn () => Str::markdown($value ?? '')
        );
    }

    public function getRenderCacheKey(string $key, ?string $value) : string
    {
        return sprintf('%s.%s.%s.%s', class_basename($this->model::class), $this->model->id, $key, sha1($value ?? ''));
    }
}
