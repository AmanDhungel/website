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
        Schema::create('header_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('menu_name');
            $table->enum('menu_type',['page','module','url'])->default('page');
            $table->integer('module_type_id')->nullable();
            $table->string('menu_url');
            $table->integer('order');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_menus');
    }
};
