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
        Schema::create('products_wishlists', function (Blueprint $table) {
            $table->id();
            $table->string('email',200);
            $table->unsignedBigInteger('product_id');

            $table->foreign('email')
                  ->references('email')->on('profiles')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreign('product_id')
                  ->references('id')->on('products')
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
        Schema::dropIfExists('products_wishlists');
    }
};
