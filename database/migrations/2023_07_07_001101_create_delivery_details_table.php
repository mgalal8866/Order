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
        Schema::create('delivery_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_header_id')->nullable();//اى دى الفاتوره
            $table->integer('product_details_id')->nullable();//اى دى منتج
            $table->decimal('buyprice',8,2)->nullable();//سعر شراء
            $table->decimal('sellprice',8,2)->nullable();//سعر بيع
            $table->float('quantity')->nullable();//كمية
            $table->decimal('subtotal',8,2)->nullable();//اجمالى كميه فى السعر
            $table->decimal('discount',8,2)->nullable();//الخصم
            $table->decimal('grandtotal',8,2)->nullable();//الاجمالى بعد الخصم
            $table->decimal('profit',8,2)->nullable();// الربح = سعر الشرا- سعر البيع * الكمية - الخصم
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_details');
    }
};
