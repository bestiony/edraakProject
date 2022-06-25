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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->string('size');
            $table->unsignedInteger('image_id');
            $table->unsignedInteger('return_policy_id');
            $table->unsignedInteger('category');
            $table
                ->foreign('image_id')
                ->references('id')
                ->on('images');
            $table
                ->foreign('return_policy_id')
                ->references('id')
                ->on('return_policies');
            $table
                ->foreign('category')
                ->references('id')
                ->on('categories');
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
};
