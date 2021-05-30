<?php

namespace Arungpisyadi\Xoeshee\Bakers;

use Arungpisyadi\Xoeshee\Contracts\CartInterface;
use Arungpisyadi\Xoeshee\Contracts\UserInterface;
use Arungpisyadi\Xoeshee\Models\EloquentWishlist as Wishlist;
use Arungpisyadi\Xoeshee\Traits\CanBeCarted;

class WishlistBaker extends Baker implements CartInterface {
	use CanBeCarted;
	protected $model, $typeRepo, $variationRepo;
	public function __construct(Wishlist $model) {
		$this->model = $model;
		$this->typeRepo = app('ProductVariationTypeBaker');
		$this->variationRepo = app('ProductVariationBaker');
	}
	public function pushWishToCart($wish, UserInterface $user = null) {
		if (!$wish instanceof Wishlist) {
			$wish = $this->findOrFail($wish);
		}
		$user = $user ?? auth()->user();
		$user->wishlist()->detach($wish);
    	try {
    		$this->getModelName = 'cart';
    		return $this->add($wish->type, $wish->quantity, true);
    	} catch (InsufficientProductQuantity $e) {
    		$user->wishlist()->attach($wish);
    		throw new InsufficientProductQuantity;
    	}
	}

}
