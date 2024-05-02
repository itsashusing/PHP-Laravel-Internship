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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('productid');
            $table->unsignedBigInteger('categoryid');
            $table->unsignedBigInteger('subcategoryid');
            $table->string('price');
            $table->date('created_at');
            $table->integer('quantity');
            $table->unsignedBigInteger('totalprice');
            $table->integer('status')->default(1);
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('productid')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('categoryid')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategoryid')->references('id')->on('sb_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
};
