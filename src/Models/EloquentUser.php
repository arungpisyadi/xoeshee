<?php

namespace Arungpisyadi\Xoeshee\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Arungpisyadi\Xoeshee\Contracts\UserInterface;
// use Arungpisyadi\Xoeshee\Traits\Roles;

class EloquentUser extends Eloquent implements UserInterface,
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract {

	// use Roles,Authenticatable, Authorizable, CanResetPassword;
	use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';

	public function wishlist() {
		return $this->belongsToMany($this->wishlistModel, 'user_wishlist','user_id','wishlist_id');
	}
	
	public function cart() {
		return $this->belongsToMany($this->cartModel, 'cart_user','user_id','cart_id');
	}
	
	public function products() {
        if (config('market.product.review')) {
            return $this->hasMany($this->productModel, 'user_id', 'id')->where('products.reviewed_at', '!=', null);
        }
		return $this->hasMany($this->productModel, 'user_id', 'id');
	}
	
	public function coupons() {
		return $this->belongsToMany($this->couponModel, 'user_coupon', 'user_id', 'coupon_id')->withPivot('purchased');
	}
	
	// removed this function as it's conflicting with Spatie Roles & Permission
	/* public function roles()
	{
        return $this->belongsToMany($this->roleModel, 'role_user', 'user_id', 'role_id');
	} */
}