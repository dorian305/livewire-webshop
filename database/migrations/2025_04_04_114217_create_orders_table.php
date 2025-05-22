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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->index();
            $table->foreignId('cart_id')->constrained()->onDelete('cascade')->index();
            $table->string('customer_name');
            $table->string('contact_email');
            $table->string('contact_phone_number');
            $table->string('contact_address');
            $table->string('shipping_address');
            $table->integer('order_status')->index();
            $table->float('total_amount');
            $table->string('payment_method');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
