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
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->increments('PurchaseD_id');
            $table->bigInteger('Purchase_H_id')->nullable();
            $table->bigInteger('Product_Details_Id')->nullable();
            $table->datetime('ExpireDate')->nullable()->nullable();
            $table->decimal('BuyPrice', 18, 0)->nullable();
            $table->decimal('SellPrice', 18, 0)->nullable();
            $table->decimal('Quantity', 18, 0)->nullable();
            $table->decimal('SubTotal', 18, 0)->nullable();
            $table->decimal('Discount', 18, 0)->nullable();
            $table->decimal('GrandTotal', 18, 0)->nullable();
            $table->boolean('IsReturn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_details');
    }
};
