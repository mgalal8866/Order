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
        Schema::create('erolment_emps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jop_id');
            $table->string('emp_name');
            $table->string('emp_fhone');
            $table->text('emp_note');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erolment__emps');
    }
};
