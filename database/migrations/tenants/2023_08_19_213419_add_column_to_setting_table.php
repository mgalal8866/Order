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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('sms_username')->nullable();
            $table->string('sms_password')->nullable();
            $table->string('sms_senderid')->nullable();
            $table->text('fire_apiKey')->nullable();
            $table->text('fire_authDomain')->nullable();
            $table->text('fire_project_id')->nullable();
            $table->text('fire_storageBucket')->nullable();
            $table->text('fire_messagingSender_id')->nullable();
            $table->text('fire_app_id')->nullable();
            $table->text('fire_measurement_id')->nullable();
            $table->text('fire_servies')->nullable();
            $table->text('pusher_app_id')->nullable();
            $table->text('pusher_app_key')->nullable();
            $table->text('pusher_app_SECRET')->nullable();
            $table->string('pusher_host')->nullable();
            $table->string('pusher_port')->nullable()->default("443");
            $table->string('pusher_scheme')->nullable()->default('https');
            $table->string('pusher_app_cluster')->nullable()->default('mt1');
            $table->string('site_color_primary')->nullable();
            $table->string('site_color_second')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
