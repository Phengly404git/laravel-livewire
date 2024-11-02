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
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('brand');
            $table->string('color');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('slug');
            $table->string('title')->nullable();
            $table->mediumText('keyword')->nullable();
            $table->mediumText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('cost_of_good');
            $table->integer('price');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('0=no_trending,1=trending');
            $table->tinyInteger('status')->default('0');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
