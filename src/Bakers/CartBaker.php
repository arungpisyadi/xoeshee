<?php
namespace Arungpisyadi\Xoeshee\Bakers;

use Arungpisyadi\Xoeshee\Contracts\CartInterface;
use Arungpisyadi\Xoeshee\Models\EloquentCart;
use Arungpisyadi\Xoeshee\Traits\CanBeCarted;

class CartBaker extends Baker implements CartInterface {
	use CanBeCarted;
	protected $model, $typeRepo, $variationRepo;
	public function __construct(EloquentCart $model) {
		$this->model = $model;
		$this->typeRepo = app('ProductVariationTypeBaker');
		$this->variationRepo = app('ProductVariationBaker');

	}
}