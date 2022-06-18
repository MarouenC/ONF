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
        Schema::create('products', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string("product_name");
            $table->string("product_image")->nullable();
            $table->float("product_price");
            $table->string("product_description");
            $table->bigInteger("product_phone");
            $table->string("product_email");
            $table->string("product_deliverable");
            $table->string("product_category");
            $table->string("product_location");
            $table->timestamps();
            $table-> index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
