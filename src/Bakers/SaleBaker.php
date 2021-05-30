<?php

namespace Arungpisyadi\Xoeshee\Bakers;

use Arungpisyadi\Xoeshee\Models\EloquentSale;


class SaleBaker extends Baker {
    protected $model;

    public function __construct(EloquentSale $model) {
        $this->model = $model;
    }
}
