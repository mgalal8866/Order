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
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('Expenses_id');
            $table->integer('ExpT_id')->nullable();
            $table->decimal('Exp_Amount', 18, 0);
            $table->text('Exps_note')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('Expenses_acteve')->nullable();
            $table->integer('safe_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
