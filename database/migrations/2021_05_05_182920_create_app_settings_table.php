<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->nullable();
            $table->string('app_short_name')->nullable();
            $table->string('app_logo')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('office_phone_1')->nullable();
            $table->string('office_contact_person_name')->nullable();
            $table->string('office_contact_person_number')->nullable();
            $table->string('office_contact_person_number_1')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_location_lat')->nullable();
            $table->string('office_location_lan')->nullable();
            $table->text('office_map_address')->nullable();
            $table->string('office_email_address')->nullable();
            $table->string('office_email_address_1')->nullable();
            $table->string('office_facebook_link')->nullable();
            $table->string('office_linkedin_link')->nullable();
            $table->string('office_youtube_link')->nullable();
            $table->string('office_insta_link')->nullable();
            $table->string('office_twitter_link')->nullable();
            $table->string('office_whatsup_link')->nullable();
            $table->string('office_viber_link')->nullable();
            $table->boolean('login_attempt_required')->default(false);
            $table->integer('login_attempt_limit')->nullable();
            $table->boolean('login_captcha_required')->default(false);
            $table->boolean('forget_password_required')->default(true);
            $table->string('login_title')->nullable();
            $table->integer('session_expire_time')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_settings');
    }
};
