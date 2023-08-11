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
        Schema::create('offer_bays', function (Blueprint $table) {
            $table->increments('PartnersID');
            $table->string('name', 50)->nullable();
            $table->string('Fhone', 50)->nullable();
            $table->decimal('FromeBalnce', 18, 2)->nullable();
            $table->decimal('nowBalnce', 18, 2)->nullable();
            $table->decimal('percent_store', 4, 2)->nullable();
            $table->boolean('steos')->nullable();
            $table->text('note')->nullable();
            $table->integer('userID')->nullable();
            $table->boolean('PartnersActeve')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_bays');
    }
};
