<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('sku');
            $table->string('name');
            $table->string('currency');
            $table->decimal('original_price');
            $table->decimal('special_price')->nullable();
            $table->string('content')->nullable();
            $table->string('url');
            $table->string('image_src');
            $table->integer('in_stock')->default(0);
            $table->string('brand')->nullable();
            $table->string('delivery_time');
            $table->string('delivery_cost');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords')->nullable();
            $table->string('slug');
            $table->integer('is_active')->default(0);
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
