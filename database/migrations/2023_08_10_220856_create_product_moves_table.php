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
        Schema::create('product_moves', function (Blueprint $table) {
            $table->increments('Product_Moves_ID');
            $table->integer('Product_ID');
            $table->decimal('Quantity', 18, 3)->nullable();
            $table->decimal('BuyPrice', 18, 2)->nullable();
            $table->decimal('SellPrice', 18, 2)->nullable();
            $table->decimal('Profit', 18, 2)->nullable();
            $table->integer('NumperMove')->nullable();
            $table->integer('user_ID')->nullable();
            $table->string('InvoiceType');
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_moves');
    }
};
