<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;

class UserFavoriteProductTest extends TestCase
{
    use DatabaseMigrations;

    // 游客不能收藏商品
    /** @test */
    public function a_guest_may_not_add_favorite_product()
    {
        $product = create(Product::class);
        $response = $this->post('/products/' . $product->id .'/favorite');
        $response->assertRedirect('/login');
    }

    // 用户收藏商品
    /** @test */
    public function a_user_can_add_favorite_product()
    {
        $user = create(User::class);
        $this->actingAs($user);
        $product = create(Product::class);
        $response = $this->post('/products/' . $product->id .'/favorite');
        $response->assertStatus(200);
    }

    // 游客不能看到收藏列表
    /** @test */
    public function a_guest_can_not_see_favorite_product_list()
    {
        $response = $this->get('/products/favorites');
        $response->assertRedirect('/login');
    }

     // 用户可以看到收藏列表
     /** @test */
    public function a_user_can_see_favorite_product_list()
    {
        $user = create(User::class);
        $this->actingAs($user);
        $product = create(Product::class);
        $this->post('/products/' . $product->id .'/favorite');
        $response = $this->get('/products/favorites');
        $response->assertSee($product->title);
    }

    // 用户可以取消收藏商品
    /** @test */
    public function a_user_cancel_favorite_product()
    {
        $user = create(User::class);
        $this->actingAs($user);
        $product = create(Product::class);
        $this->post('/products/' . $product->id .'/favorite');
        $response = $this->delete('/products/' . $product->id .'/favorite');
        $response->assertStatus(200);
    }

}
