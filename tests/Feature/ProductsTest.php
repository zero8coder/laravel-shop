<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\Product;
use App\Models\ProductSku;

class ProductsTest extends TestCase
{
    use DatabaseMigrations;

    // 用户能查看商品列表
    /** @test */
    public function a_user_can_view_products_list()
    {
        $product = create(Product::class);
        $response = $this->get('/products');

        $response->assertSee($product->title);
    }

    // 用户能查看商品详情
    /** @test */
    public function a_user_can_view_product_detail()
    {
        $product = create(Product::class);
        $response = $this->get('/products/'.$product->id);
        $response->assertSee($product->title);

    }

    // 用户能查看商品详情能看到 sku
    /** @test */
    public function a_user_can_view_product_detail_and_see_product_sku()
    {
        $product = create(Product::class);
        $productSku = create(ProductSku::class, ['product_id' => $product->id]);

        $response = $this->get('/products/'.$product->id);
        $response->assertSee($productSku->title);
    }


}
