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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->date('message_date')->nullable();
            $table->boolean('message_reply_status')->default(false);
            $table->bigInteger('message_reply_by')->unsigned()->nullable();
            $table->foreign('message_reply_by')->references('id')->on('users')->onUpdate('cascade');
            $table->text('message_reply_details')->nullable();
            $table->dateTime('message_reply_date')->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('contact_messages');
    }
};
