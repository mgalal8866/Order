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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Supplier_name')->nullable();
            $table->string('Supplier_code')->nullable();
            $table->bigInteger('Supplier_Balance')->nullable();
            $table->string('Supplier_fhone')->nullable();
            $table->integer('Grup_id')->nullable();
            $table->integer('Region_id')->nullable();
            $table->text('Supplier_state')->nullable();
            $table->string('Supervisor_name')->nullable();
            $table->string('Supervisor_fhone')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('agent_fhone')->nullable();
            $table->text('Supplier_note')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('Supplier_Active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
