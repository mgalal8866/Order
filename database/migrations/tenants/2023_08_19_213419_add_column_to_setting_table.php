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
            $table->longText('fire_apiKey')->nullable();
            $table->longText('fire_authDomain')->nullable();
            $table->longText('fire_project_id')->nullable();
            $table->longText('fire_storageBucket')->nullable();
            $table->longText('fire_messagingSender_id')->nullable();
            $table->longText('fire_app_id')->nullable();
            $table->longText('fire_measurement_id')->nullable();
            $table->longText('fire_servies')->nullable();
            $table->longText('pusher_app_id')->nullable();
            $table->longText('pusher_app_key')->nullable();
            $table->longText('pusher_app_SECRET')->nullable();
            $table->longText('pusher_host')->nullable();
            $table->longText('pusher_port')->default('443');
            $table->longText('pusher_scheme')->default('https');
            $table->longText('pusher_app_cluster')->default('mt1');
            $table->longText('site_color_primary')->nullable();
            $table->longText('site_color_second')->nullable();
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
