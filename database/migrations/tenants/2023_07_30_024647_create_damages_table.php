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
        Schema::create('damages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ProductDetailsId');
            $table->float('DamageQuantity',12,2);
            $table->decimal('BuyPrice',12,2);
            $table->timestamp('DamageDate');
            $table->text('DamageNotes');
            $table->decimal('DamageCost',12,2);
            $table->integer('UserId');
            $table->integer('StoreId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('damages');
    }
};
