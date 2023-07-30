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
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banks_name')->nullable();
            $table->string('banksNamper')->nullable();
            $table->string('name_branch')->nullable();
            $table->decimal('discount',8,2);
            $table->decimal('balanceNow',8,2)->nullable();
            $table->text('banks_note')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('banks_Acteve')->nullable();
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
