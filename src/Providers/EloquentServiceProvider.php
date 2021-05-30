<?php

namespace Arungpisyadi\Xoeshee\Providers;

use Illuminate\Support\ServiceProvider;
use Arungpisyadi\Xoeshee\Models\EloquentCart as Cart;
use Arungpisyadi\Xoeshee\Models\EloquentCategory as Category;
use Arungpisyadi\Xoeshee\Models\EloquentCoupon as Coupon;
use Arungpisyadi\Xoeshee\Models\EloquentProduct as Product;
use Arungpisyadi\Xoeshee\Models\EloquentProductVariation as ProductVariation;
use Arungpisyadi\Xoeshee\Models\EloquentProductVariationType as ProductVariationType;
use Arungpisyadi\Xoeshee\Models\EloquentRole;
use Arungpisyadi\Xoeshee\Models\EloquentSale as Sale;
use Arungpisyadi\Xoeshee\Models\EloquentUser as User;
use Arungpisyadi\Xoeshee\Models\EloquentWishlist as Wishlist;
use Arungpisyadi\Xoeshee\Bakers\CartBaker;
use Arungpisyadi\Xoeshee\Bakers\CategoryBaker;
use Arungpisyadi\Xoeshee\Bakers\CouponBaker;
use Arungpisyadi\Xoeshee\Bakers\ProductBaker;
use Arungpisyadi\Xoeshee\Bakers\ProductVariationBaker;
use Arungpisyadi\Xoeshee\Bakers\ProductVariationTypeBaker;
use Arungpisyadi\Xoeshee\Bakers\SaleBaker;
use Arungpisyadi\Xoeshee\Bakers\RoleBaker;
use Arungpisyadi\Xoeshee\Bakers\UserBaker;
use Arungpisyadi\Xoeshee\Bakers\WishlistBaker;

class EloquentServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->singleton('ProductVariationBaker', function () {
			return new ProductVariationBaker(new ProductVariation);
		});

		$this->app->singleton('ProductVariationTypeBaker', function () {
			return new ProductVariationTypeBaker(new ProductVariationType);
		});

		$this->app->singleton('CouponBaker', function () {
			return new CouponBaker(new Coupon);
		});

		$this->app->singleton('WishlistBaker', function () {
			return new WishlistBaker(new Wishlist);
		});

		$this->app->singleton('CategoryBaker', function () {
			return new CategoryBaker(new Category);
		});

		$this->app->singleton('UserBaker', function () {
			return new UserBaker(new User);
		});

		$this->app->singleton('SaleBaker', function () {
			return new SaleBaker(new Sale);
		});
		$this->app->singleton('RoleBaker', function () {
			return new RoleBaker(new EloquentRole);
		});

		$this->app->singleton('ProductBaker', function () {
			return new ProductBaker(new Product);
		});

		$this->app->singleton('CartBaker', function () {
			return new CartBaker(new Cart);
		});
	}
}
