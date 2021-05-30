<?php

namespace Arungpisyadi\Xoeshee\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthyServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Arungpisyadi\Xoeshee\Models\EloquentProduct::class => \Arungpisyadi\Xoeshee\Policies\ProductPolicy::class,
        \Arungpisyadi\Xoeshee\Models\EloquentCategory::class => \Arungpisyadi\Xoeshee\Policies\CategoryPolicy::class,
        \Arungpisyadi\Xoeshee\Models\EloquentUser::class => \Arungpisyadi\Xoeshee\Policies\UserPolicy::class,
        \Arungpisyadi\Xoeshee\Models\EloquentCart::class => \Arungpisyadi\Xoeshee\Policies\CartPolicy::class,
        
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('view-product','\Arungpisyadi\Xoeshee\Policies\ProductPolicy@view');
        Gate::define('update-product','\Arungpisyadi\Xoeshee\Policies\ProductPolicy@update');
        Gate::define('delete-product','\Arungpisyadi\Xoeshee\Policies\ProductPolicy@delete');
        Gate::define('create-product','\Arungpisyadi\Xoeshee\Policies\ProductPolicy@create');
        Gate::define('review-product','\Arungpisyadi\Xoeshee\Policies\ProductPolicy@review');
        Gate::define('rate-product','\Arungpisyadi\Xoeshee\Policies\ProductPolicy@rate');
        Gate::define('create-category','\Arungpisyadi\Xoeshee\Policies\CategoryPolicy@create');
        Gate::define('update-category','\Arungpisyadi\Xoeshee\Policies\CategoryPolicy@update');
        Gate::define('delete-category','\Arungpisyadi\Xoeshee\Policies\CategoryPolicy@delete');
        Gate::define('view-category','\Arungpisyadi\Xoeshee\Policies\CategoryPolicy@view');
        Gate::define('upgrade-user','\Arungpisyadi\Xoeshee\Policies\UserPolicy@upgrade');
        Gate::define('downgrade-user','\Arungpisyadi\Xoeshee\Policies\UserPolicy@downgrade');
        Gate::define('add-cart','\Arungpisyadi\Xoeshee\Policies\CartPolicy@add');
        Gate::define('delete-cart','\Arungpisyadi\Xoeshee\Policies\CartPolicy@delete');
        Gate::define('update-cart','\Arungpisyadi\Xoeshee\Policies\CartPolicy@update');
        Gate::define('delete-from-others-cart','\Arungpisyadi\Xoeshee\Policies\CartPolicy@delete_from_others');
        
    }
}