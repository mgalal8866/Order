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
        Schema::create('second_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_details_id')->nullable();
            $table->integer('pieces_number')->nullable();
            $table->decimal('discount', 7, 2)->nullable();
            $table->datetime('from_date')->nullable();
            $table->datetime('to_date')->nullable();
            $table->decimal('price_before', 10, 2)->nullable();
            $table->decimal('price_after', 10, 2)->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('second_offers');
    }
};
