<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\CartItem;

class CartItemTest extends TestCase
{
    use DatabaseMigrations;

    // 购物车项有对应的sku
    /** @test */
    public function a_cart_item_has_a_product_sku()
    {
        $cartItem = create(CartItem::class);
        $this->assertInstanceOf('App\Models\ProductSku',$cartItem->productSku);
    }


    // 购物车项有对应的用户
    /** @test */
    public function a_cart_item_has_a_user()
    {
        $cartItem = create(CartItem::class);
        $this->assertInstanceOf('App\Models\User',$cartItem->user);
    }

}
