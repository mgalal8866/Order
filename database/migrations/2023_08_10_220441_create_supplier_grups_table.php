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
        Schema::create('supplier_grups', function (Blueprint $table) {
            $table->increments('SupplierGrup_id');
            $table->string('SupplierGrup_name', 50)->nullable();
            $table->text('Grup_note')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('Grup_Active')->nullable();
            $table->primary('SupplierGrup_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_grups');
    }
};
