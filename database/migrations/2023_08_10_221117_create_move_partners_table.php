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
        Schema::create('move_partners', function (Blueprint $table) {
            $table->increments('Move_PartnersID');
            $table->integer('PartnersID')->nullable();
            $table->string('StetMove', 50)->nullable();
            $table->decimal('FromeBalncce', 18, 2)->nullable();
            $table->decimal('endBalance', 18, 2)->nullable();
            $table->decimal('moveBalnce', 18, 2)->nullable();
            $table->text('note')->nullable();
            $table->integer('userID')->nullable();
            $table->integer('safeID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('move_partners');
    }
};
