<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CartItem;
use Faker\Generator as Faker;

$factory->define(CartItem::class, function (Faker $faker) {

    return [
        'user_id' => function () {
            return factory('App\Models\User')->create()->id;
        },
        'amount' => $faker->numberBetween(0, 10),
        'product_sku_id' => function () {
            $product = factory('App\Models\Product')->create();
            $productSku = factory('App\Models\ProductSku')->create(['product_id' => $product->id]);
            return $productSku->id;
        }

    ];
});
