<?php

namespace Arungpisyadi\Xoeshee\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Arungpisyadi\Xoeshee\Models\EloquentProduct as Product;
use App\Models\User;

class ProductPolicy
{
    use HandlesAuthorization;
    
	public function rate(User $user)
	{
		return $user->hasAnyRole(['dev','admin','vendor','assistant']);
	}
	public function review(User $user, Product $product)
	{
		// return $user->hasRole(['dev','admin','vendor','assistant']) && $product->shouldBeReviewed();
        return $product->shouldBeReviewed();
	}

    public function view(User $user, Product $product)
    {
        return $user->hasAnyRole(['dev','admin','vendor','assistant']);
    }

    public function create(User $user)
    {
        return $user->hasAnyRole(['dev','admin','vendor','assistant']);
    }

    public function update(User $user, Product $product)
    {
        return $user->hasAnyRole(['dev','admin','vendor','assistant']) || $product->user_id == $user->id;
    }

    public function delete(User $user, Product $product)
    {
        return $user->hasAnyRole(['dev','admin','vendor','assistant']) || $product->user_id == $user->id;
    }
}
