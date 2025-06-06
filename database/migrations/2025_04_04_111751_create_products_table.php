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

            $table->string('image_url')->nullable();
            $table->string('title')->index();
            $table->string('description')->index();
            $table->float('unit_price')->index();
            $table->string('unit_measure');
            $table->integer('stock_quantity')->index();
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->index();

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
