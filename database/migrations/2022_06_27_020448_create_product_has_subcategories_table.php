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
        Schema::create('product_has_subcategories', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->foreign('subcategory_id')
                ->references('id')
                ->on('subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_has_subcategories');
    }
};
