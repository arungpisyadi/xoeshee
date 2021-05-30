<?php

namespace Arungpisyadi\Xoeshee\Bakers;

use Arungpisyadi\Xoeshee\Models\EloquentCategory;

class CategoryBaker extends Baker {
	protected $model;

	public function __construct(EloquentCategory $model) {
		$this->model = $model;
	}
	public function generate($type) {
		return $this->model->firstOrCreate(compact('type'));
	}
}