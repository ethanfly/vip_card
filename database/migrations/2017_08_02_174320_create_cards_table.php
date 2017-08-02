<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->enum('type', ['打折卡', '充值打折卡', '次数卡', '充送卡']);
            $table->string('name', 20)->comment('卡片名称');
            $table->decimal('buy_price')->comment('卡片金额');
            $table->decimal('send_price')->comment('赠送金额')->default(0);
            $table->decimal('discount', 2, 1)->comment('打折')->default(0);
            $table->mediumInteger('frequency')->comment('次数')->default(0);
            $table->text('introduce')->comment('卡片说明');
            $table->string('img', 50)->comment('卡片图标');
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
        Schema::dropIfExists('cards');
    }
}
