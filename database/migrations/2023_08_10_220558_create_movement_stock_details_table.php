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
        Schema::create('movement_stock_details', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('MovementStockId')->nullable();
            $table->integer('ProductDetailsId')->nullable();
            $table->float('Quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement_stock_details');
    }
};
