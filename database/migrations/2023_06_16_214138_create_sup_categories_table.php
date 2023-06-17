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
        Schema::create('sup_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sup_name');
            $table->string('image');
            $table->string('sup_note');
            $table->integer('parent_id');
            $table->boolean('sup_active');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sup_categories');
    }
};
