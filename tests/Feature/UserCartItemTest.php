<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\User;

class UserCartItemTest extends TestCase
{
    use DatabaseMigrations;

    // 游客不能添加购物车
    /** @test */
    public function a_guest_may_not_add_cart_item()
    {
        $product = create(Product::class);
        $productSku = create(ProductSku::class, ['product_id' => $product->id]);
        $postData = [
            'sku_id' => $productSku->id,
            'amount' => 1,
        ];
        $response = $this->post('cart', $postData);
        $response->assertRedirect('/login');
    }

    // 用户能添加购物车
    /** @test */
    public function a_user_can_add_cart_item()
    {
        $user = create(User::class);
        $this->actingAs($user);
        $product = create(Product::class);
        $productSku = create(ProductSku::class, ['product_id' => $product->id]);
        $postData = [
            'sku_id' => $productSku->id,
            'amount' => 1,
        ];
        $response = $this->post('cart', $postData);
        $response->assertStatus(200);
    }

    // 游客不能看购物车列表
    /** @test */
    public function a_guest_may_not_view_cart_item_list()
    {
        $response = $this->get('cart');
        $response->assertRedirect('/login');
    }

    // 用户可以查看购物车列表
    /** @test */
    public function a_user_can_view_cart_item_list()
    {
        $user = create(User::class);
        $this->actingAs($user);
        $product = create(Product::class);
        $productSku = create(ProductSku::class, ['product_id' => $product->id]);
        $postData = [
            'sku_id' => $productSku->id,
            'amount' => 1,
        ];
        $this->post('cart', $postData);

        $response = $this->get('cart');
        $response->assertSee($product->title);
    }
}
