<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 32);
            $table->string('target', 100)->default('total');
            $table->json('categories')->nullable();
            $table->json('products')->nullable();
            $table->unsignedBigInteger('user_id')->index('coupons_user_id_foreign');
            $table->integer('amount')->default(1);
            $table->integer('user_max')->nullable()->default(0);
            $table->double('min_order', 8, 2)->nullable()->default(0.00);
            $table->double('max_discount', 8, 2)->nullable()->default(0.00);
            $table->boolean('active')->default(1);
            $table->string('user_level', 100)->nullable();
            $table->dateTime('started_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->double('percentage', 8, 2)->default(0.00);
            $table->tinyInteger('is_percent')->nullable()->default(0);
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
        Schema::dropIfExists('coupons');
    }
}
