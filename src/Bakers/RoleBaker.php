<?php

namespace Arungpisyadi\Xoeshee\Bakers;

use Arungpisyadi\Xoeshee\Models\EloquentRole;


class RoleBaker extends Baker {
    protected $model;

    public function __construct(EloquentRole $model) {
        $this->model = $model;
    }
    public function findbySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }
}
