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
        Schema::create('coupons', function (Blueprint $table) {
            // $table->id();
            // $table->string('coupon_code')->unique();
            // $table->enum('coupon_type', ['percentage', 'fixed']); // Type of discount
            // $table->decimal('discount_value', 8, 2); // Discount value
            // $table->decimal('minimum_amount', 8, 2)->nullable(); // Minimum order amount for the coupon to be valid
            // $table->date('expiration_date'); // Coupon expiration date
            // $table->boolean('is_active')->default(true); // Whether the coupon is active
            // $table->timestamps();
            $table->id();
            $table->string('coupon_name');

            $table->string('coupon_code')->unique();
            $table->enum('coupon_type', ['percentage', 'fixed']);
            $table->integer('discount_value');
            $table->integer('minimum_amount')->nullable();
            $table->date('start_date');
            $table->date('expiration_date');
            $table->boolean('is_active')->default(true);
            $table->integer('usage_limit')->nullable(); // Add a field for coupon usage limit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
