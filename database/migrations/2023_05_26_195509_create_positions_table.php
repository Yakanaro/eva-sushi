<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
//    public function up(): void
//    {
//        Schema::create('positions', function (Blueprint $table) {
//            $table->id();
//            $table->string('name');
//            $table->text('description');
//            $table->decimal('price', 8, 2);
//            $table->boolean('status')->default(true);
//            $table->string('preview_image');
//            $table->timestamps();
//
//            $table->unsignedBigInteger('cart_id')->nullable();
//            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
//
//            $table->unsignedBigInteger('categories_id');
//
//            $table->index('categories_id', 'position_category_idx');
//
//            $table->foreign('categories_id', 'position_category_fk')->on('categories')->references('id');
//        });
//    }
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->boolean('status')->default(true);
            $table->string('preview_image');
            $table->timestamps();

            $table->unsignedBigInteger('cart_id')->nullable();
            $table->unsignedBigInteger('categories_id');

            $table->index('categories_id', 'position_category_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
