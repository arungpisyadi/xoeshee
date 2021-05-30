<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index('cart_user_user_id_foreign');
            $table->unsignedInteger('cart_id')->index('cart_user_cart_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_user');
    }
}
