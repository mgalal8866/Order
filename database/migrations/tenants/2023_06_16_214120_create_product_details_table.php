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
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('source_id')->nullable();
            $table->integer('product_header_id');
            $table->integer('productd_unit_id')->nullable();
            $table->string('productd_barcode')->nullable();
            $table->integer('productd_size')->nullable();
            $table->decimal('productd_bay',8,3)->nullable();//سعر الشراء
            $table->decimal('productd_Sele1',8,3)->nullable();//سعر البيع العادى
            $table->decimal('productd_Sele2',8,3)->nullable();//سعر العرض
            $table->integer('productd_fast_Sele')->nullable();//
            $table->integer('productd_UnitType')->nullable();
            $table->string('productd_image')->nullable();
            $table->boolean('isoffer')->default(0)->nullable();;
            $table->boolean('productd_online')->default(1)->nullable();;
            $table->decimal('maxqty',8,2)->nullable();// اقصى كميه للطلب
            $table->timestamp('EndOferDate')->nullable();//تاريخ انهاء العرض
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
