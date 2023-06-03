<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('short_des',500);
            $table->string('price',100);
            $table->boolean('discount');
            $table->string('discount_price',100);
            $table->string('image',100);
            $table->boolean('stock');
            $table->float('star');
            $table->enum('remark',['Popular','New','Top','Special','Trending','Regular']);
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreign('brand_id')
                  ->references('id')->on('brands')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
