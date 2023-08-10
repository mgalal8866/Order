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
        Schema::create('stock_settlements', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('NoSettlement');
            $table->integer('ProductDetailsId');
            $table->timestamp('SettlementDate');
            $table->decimal('StockNow');
            $table->decimal('StockNew');
            $table->decimal('QuantityDifference');
            $table->decimal('BayProduct', 18, 2);
            $table->decimal('totalCost', 18, 2);
            $table->integer('StoreID');
            $table->integer('UserID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_settlements');
    }
};
