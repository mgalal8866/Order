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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fsm')->nullable();
            $table->string('client_fhonewhats')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('source_id')->nullable();
            $table->string('client_name')->nullable();
            $table->decimal('client_Balanc',8,2)->default(0);
            $table->decimal('client_points',8,2)->default(0);
            $table->string('client_fhoneLeter')->nullable();
            $table->string('client_EntiteNumber')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('lat_mab')->nullable();
            $table->string('long_mab')->nullable();
            $table->string('client_state')->nullable();//عنوان
            $table->decimal('client_Credit_Limit',8,2)->default(0);//الحد الائتمانى
            $table->string('default_Sael')->default('كاش');//نوع التعامل كاش وتقسيط
            $table->text('client_note')->nullable();
            $table->boolean('client_Active')->default(1);
            $table->string('client_code')->nullable();
            $table->integer('categoryAPP')->nullable();
            $table->integer('source_type')->nullable();
            $table->string('last_active')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
