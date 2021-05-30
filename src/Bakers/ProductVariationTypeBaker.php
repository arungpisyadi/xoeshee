<?php

namespace Arungpisyadi\Xoeshee\Bakers;

use Arungpisyadi\Xoeshee\Exceptions\InsufficientProductQuantity;
use Arungpisyadi\Xoeshee\Exceptions\ProductDoesNotExist;
use Arungpisyadi\Xoeshee\Models\EloquentProductVariationType as ProductVariationType;
use Arungpisyadi\Xoeshee\Bakers\Traits\HasStock;

class ProductVariationTypeBaker extends Baker {
	use HasStock;
	protected $model;

	public function __construct(ProductVariationType $model) {
		$this->model = $model;
	}
	public function stock($id) {
		return $this->model->findOrFail($id)->stock;
	}

	public function incrementStock($id, int $stock = 1) {
		return $this->incrementOrDecrementStock($id, $stock);
	}
	protected function incrementOrDecrementStock($type, $stock, $method = 'increment') {
		if (!$type instanceof ProductVariationType) {
			$type = $this->model->find($type);
		}
		throw_unless($type->product, new ProductDoesNotExist);
		throw_if(($type->stock < $stock && $method == 'decrement'), new InsufficientProductQuantity);
		$type->$method('stock', $stock);
		return $type;
	}
	public function decrementStock($id, int $stock = 1) {
		return $this->incrementOrDecrementStock($id, $stock, 'decrement');
	}

}