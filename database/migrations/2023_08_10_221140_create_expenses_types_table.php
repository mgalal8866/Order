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
        Schema::create('expenses_types', function (Blueprint $table) {
            $table->increments('ExpensesT_id');
            $table->string('Exp_name');
            $table->text('Exp_note')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('Exp_Acteve')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses_types');
    }
};
