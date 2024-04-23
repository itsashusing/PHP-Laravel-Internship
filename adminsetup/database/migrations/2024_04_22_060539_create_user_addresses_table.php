<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('villagename');
            $table->unsignedBigInteger('district');
            $table->unsignedBigInteger('state');
            $table->unsignedBigInteger('country');
            $table->unsignedBigInteger('user_id');
            $table->boolean('default')->default('0');
            $table->foreign('district')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_addresses');
    }
};
