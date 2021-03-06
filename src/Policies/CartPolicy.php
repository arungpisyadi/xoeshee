<?php

namespace Arungpisyadi\Xoeshee\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Arungpisyadi\Xoeshee\Models\EloquentUser as User;
use Arungpisyadi\Xoeshee\Models\EloquentCart as Cart;
class CartPolicy
{
    use HandlesAuthorization;
	public function delete_from_others(User $user)
	{
		return $user->hasRole('delete_from_others-cart');
	}
	public function add(User $user)
	{
		return $user->hasRole('add-cart');
	}

    public function view(User $user, Cart $cart)
    {
        return $user->hasRole('view-cart');
    }

    public function create(User $user)
    {
        return $user->hasRole('create-cart');
    }

    public function update(User $user, Cart $cart)
    {
        return $user->hasRole('update-cart') || $cart->user_id == $user->id;
    }

    public function delete(User $user, Cart $cart)
    {
        return $user->hasRole('delete-cart') || $cart->user_id == $user->id;
    }
}
