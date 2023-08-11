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
        Schema::create('purchase_headers', function (Blueprint $table) {
            $table->increments('PurchaseH_id');
            $table->integer('invoice_Number')->nullable();
            $table->boolean('InvoiceType')->nullable();
            $table->string('Company_invoice_number')->nullable();
            $table->integer('Suppliers_id')->nullable();
            $table->integer('Store_id')->nullable();
            $table->integer('Safe_id')->nullable();
            $table->string('Name_Emp')->nullable();
            $table->binary('image_invoice')->nullable();
            $table->text('note')->nullable();
            $table->integer('uoser_id')->nullable();
            $table->bigInteger('Sup_total')->nullable();
            $table->bigInteger('Total_Discount')->nullable();
            $table->bigInteger('Suppliers_Last_balance')->nullable();
            $table->bigInteger('Grand_Total')->nullable();
            $table->bigInteger('Paid')->nullable();
            $table->bigInteger('Remaining')->nullable();
            $table->bigInteger('Suppliers_Final_balance')->nullable();
            $table->bigInteger('tax')->nullable();
            $table->string('noCare')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_headers');
    }
};
