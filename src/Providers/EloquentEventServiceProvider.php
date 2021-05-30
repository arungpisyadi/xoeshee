<?php

namespace Arungpisyadi\Xoeshee\Providers;

use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		if (config('market.observers.register')) {
			\Arungpisyadi\Xoeshee\Models\EloquentProduct::observe(\Arungpisyadi\Xoeshee\Observers\ProductObserver::class);
			\Arungpisyadi\Xoeshee\Models\EloquentCoupon::observe(\Arungpisyadi\Xoeshee\Observers\CouponObserver::class);

		}
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
