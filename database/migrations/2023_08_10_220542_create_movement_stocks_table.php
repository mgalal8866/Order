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
        Schema::create('movement_stocks', function (Blueprint $table) {
            $table->increments('Move_Id');
            $table->string('FromStore')->nullable();
            $table->string('ToStore')->nullable();
            $table->timestamp('MoveDate')->nullable();
            $table->integer('UserId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement_stocks');
    }
};
