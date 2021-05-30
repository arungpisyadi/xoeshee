<?php

namespace Arungpisyadi\Xoeshee\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Arungpisyadi\Xoeshee\Models\EloquentUser as User;
use Arungpisyadi\Xoeshee\Models\EloquentCategory as Category;
class CategoryPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Category $category)
    {
        return $user->hasRole('view-category');
    }

    public function create(User $user)
    {
        return $user->hasRole('create-category');
    }

    public function update(User $user, Category $category)
    {
        return $user->hasRole('update-category') || $category->user_id == $user->id;
    }

    public function delete(User $user, Category $category)
    {
        return $user->hasRole('delete-category') || $category->user_id == $user->id;
    }
}
