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
        Schema::create('settings', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name_shop')->nullable();
            $table->string('maneger_phone')->nullable();
            $table->string('phone_shop')->nullable();
            $table->string('address_shop')->nullable();
            $table->string('logo_shop')->nullable();
            $table->string('message_report')->nullable();
            $table->decimal('delivery_amount',8,2)->nullable();//قيمه توصيل
            $table->string('delivery_message')->nullable();//
            $table->boolean('salesstatus')->nullable();
            $table->boolean('point_system')->nullable();//نظام بيع بالنقاط
            $table->decimal('point_price',8,2)->nullable();
            $table->decimal('point_le',8,2)->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('supcategory_id')->nullable();
            $table->string('type_of_goods')->nullable();
            $table->string('delivery_though')->nullable();
            $table->string('minimum_products')->nullable();
            $table->string('minimum_financial')->nullable();
            $table->boolean('deferred_sale')->nullable();
            $table->string('low_profit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
