<?php

namespace Arungpisyadi\Xoeshee\Bakers;

use Arungpisyadi\Xoeshee\Contracts\UserInterface;
use Arungpisyadi\Xoeshee\Models\EloquentUser;

class UserBaker extends Baker {
	protected $model,$roleRepo;

	public function __construct(EloquentUser $model) {
		$this->model = $model;
        $this->roleRepo = app('RoleBaker');
	}
    public function giveRole($slug , UserInterface $user = null)
    {
        if (!$user && auth()->check()) {
            $user = auth()->user();
        }
        $role = $this->roleRepo->findbySlug($slug);
        $user->roles()->sync($role);
    }
}
