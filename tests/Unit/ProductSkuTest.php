<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\ProductSku;
use App\Models\Product;

class ProductSkuTest extends TestCase
{
    use DatabaseMigrations;

    // sku 有其对应的 product
    /** @test */
    public function a_productSku_has_a_product()
    {
        $product = create(Product::class);
        $productSku = create(ProductSku::class, ['product_id' => $product->id]);

        $this->assertInstanceOf('App\Models\Product', $productSku->product);
    }
}

