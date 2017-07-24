<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopPayInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_pay_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->string('card_number',20)->comment('银行卡卡号');
            $table->string('owner_name',20)->comment('用户姓名');
            $table->string('opening_bank',50)->comment('开户行');
            $table->string('phone',20)->comment('预留号码');
            $table->string('emergency_contact',20)->comment('紧急联系人号码');
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
        Schema::dropIfExists('shop_pay_information');
    }
}
