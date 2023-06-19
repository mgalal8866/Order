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
        Schema::create('sales_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoicenumber')->nullable();
            $table->integer('invoicetype')->nullable();
            $table->timestamp('invoicedate')->nullable();
            $table->integer('client_id')->nullable();
            $table->decimal('lastbalance',8,2)->nullable();
            $table->decimal('finalbalance',8,2)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('store_id')->nullable();
            $table->integer('safe_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('employ_id')->nullable();
            $table->boolean('dis_point_active')->nullable();
            $table->text('paytayp')->nullable();
            $table->decimal('subtotal')->nullable();
            $table->decimal('totaldiscount',8,2)->nullable();
            $table->decimal('discount_g',8,2)->nullable();
            $table->decimal('discount_f',8,2)->nullable();
            $table->decimal('total_add_amount',8,2)->nullable();
            $table->decimal('add_amount_g',8,2)->nullable();
            $table->decimal('add_amount_f',8,2)->nullable();
            $table->decimal('discount_product',8,2)->nullable();
            $table->decimal('discount_sales',8,2)->nullable();
            $table->decimal('discount_point',8,2)->nullable();
            $table->decimal('grandtotal',8,2)->nullable();
            $table->decimal('paid',8,2)->nullable();
            $table->decimal('remaining',8,2)->nullable();
            $table->decimal('total_profit',8,2)->nullable();
            $table->text('note')->nullable();
            $table->decimal('deliverycost',8,2)->nullable();
            $table->boolean('satus_delivery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_headers');
    }
};
