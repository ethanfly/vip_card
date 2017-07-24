<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->string('front_of_id',50)->comment('身份证正面');
            $table->string('back_of_id',50)->comment('身份证背面');
            $table->string('handheld',50)->comment('手持身份证');
            $table->string('business_license',50)->comment('营业执照');
            $table->timestamps();
            $table->foreign('shop_id')
                ->references('id')->on('shops')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_certifications');
    }
}
