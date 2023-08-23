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
            $table->longText('fire_projectId')->nullable();
            $table->longText('fire_storageBucket')->nullable();
            $table->longText('fire_messagingSenderId')->nullable();
            $table->longText('fire_appId')->nullable();
            $table->longText('fire_measurementId')->nullable();
            $table->longText('PUSHER_APP_ID')->nullable();
            $table->longText('PUSHER_APP_KEY')->nullable();
            $table->longText('PUSHER_APP_SECRET')->nullable();
            $table->longText('PUSHER_HOST')->nullable();
            $table->longText('PUSHER_PORT')->default('443');
            $table->longText('PUSHER_SCHEME')->default('https');
            $table->longText('PUSHER_APP_CLUSTER')->default('mt1');
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
