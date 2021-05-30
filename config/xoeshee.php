<?php

return [
    'product' => [
        'review' => true,
    ],
    'cart' => [
        'tax' => [
            'enabled' => true,
            'percentage' => 10
        ],
    ],

    'models' => [
        'namespace' => '\\App\\',
        'user' => [],
        'package' => [
            'cart' => \Arungpisyadi\Xoeshee\Models\EloquentCart::class,
            'category' => \Arungpisyadi\Xoeshee\Models\EloquentCategory::class,
            'coupon' => \Arungpisyadi\Xoeshee\Models\EloquentCoupon::class,
            'product' => \Arungpisyadi\Xoeshee\Models\EloquentProduct::class,
            'product_variation' => \Arungpisyadi\Xoeshee\Models\EloquentProductVariation::class,
            'product_variation_type' => \Arungpisyadi\Xoeshee\Models\EloquentProductVariationType::class,
            'role' => \Arungpisyadi\Xoeshee\Models\EloquentRole::class,
            'sale' => \Arungpisyadi\Xoeshee\Models\EloquentSale::class,
            'user' => \Arungpisyadi\Xoeshee\Models\EloquentUser::class,
            'wishlist' => \Arungpisyadi\Xoeshee\Models\EloquentWishlist::class
        ]
    ],
    'observers' => [
        'register' => true,
    ],
    'bakers' => [
        'namespace' => '\App\Bakers',
        'user'      => [],
    ],


];
