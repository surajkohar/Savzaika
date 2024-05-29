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
         
            $table->id(); // Auto-incremental primary key
            $table->string('name'); // 'name' column
            $table->text('description'); // 'description' column
            $table->decimal('price', 10, 2); // 'price' column with decimal type
            $table->integer('stock'); // 'stock' column as an integer
            $table->timestamps(); // Created at and updated at timestamps
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
