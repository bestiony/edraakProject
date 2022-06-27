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
            $table->id('id');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->string('size');
            $table->foreignId('image_id')->constrained();
            $table->foreignId('return_policy_id')->constrained();
            $table->foreignId('category_id')->constrained();

            // $table->integer('image_id')->unsigned();
            // $table->integer('return_policy_id')->unsigned();
            // $table->integer('category')->unsigned();
            // $table
            //     ->foreign('image_id')
            //     ->references('id')
            //     ->on('images');
            // $table
            //     ->foreign('return_policy_id')
            //     ->references('id')
            //     ->on('return_policies');
            // $table
            //     ->foreign('category')
            //     ->references('id')
            //     ->on('categories');
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
