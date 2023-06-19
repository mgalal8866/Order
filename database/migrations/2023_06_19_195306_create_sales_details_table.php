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
        Schema::create('sales_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_header_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->decimal('buyprice',8,2)->nullable();
            $table->decimal('sellprice',8,2)->nullable();
            $table->float('quantity')->nullable();
            $table->decimal('subtotal',8,2)->nullable();
            $table->decimal('discount',8,2)->nullable();
            $table->decimal('grandtotal',8,2)->nullable();
            $table->decimal('profit',8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_details');
    }
};
