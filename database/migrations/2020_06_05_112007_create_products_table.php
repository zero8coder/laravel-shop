<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('商品标题');
            $table->text('description')->comment('商品详情');
            $table->string('image')->comment('商品封面图片文件路径');
            $table->boolean('on_sale')->comment('商品是否正在售卖')->default(true);
            $table->float('rating')->comment('商品平均评分')->default(5);
            $table->unsignedInteger('sold_count')->comment('销量')->default(0);
            $table->unsignedInteger('review_count')->comment('评价数量')->default(0);
            $table->decimal('price', 10, 2)->comment('SKU 最低价格');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
