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
            $table->string('title');
            $table->integer('price');
            $table->integer('del_price');
            $table->string('discount');
            $table->text('detail');
            $table->string('color');
            $table->string('size_id');
            $table->string('category_id');
            $table->string('brand_id');
            $table->string('sku');
            $table->longText('description');
            $table->string('capacity');
            $table->string('water_resistant');
            $table->string('material');
            $table->integer('views')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('slug');
            $table->timestamps();
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
