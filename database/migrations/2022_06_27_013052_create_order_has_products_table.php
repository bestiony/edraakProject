<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_has_products', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();

            $table->integer('quantity')->nullable(false);
            // $table->integer('order_id')->unsigned();
            // $table->integer('product_id')->unsigned();
            // $table->foreign('order_id')
            //     ->references('id')
            //     ->on('orders');
            // $table->foreign('product_id')
            //     ->references('id')
            //     ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_has_products');
    }
};
