<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname', 30)->nullable();
            $table->string('openid', 30)->unique();
            $table->string('phone', 11)->unique()->nullable();
            $table->string('headimgurl')->nullable();
            $table->smallInteger('sex')->default(0);
            $table->string('city', 10)->nullable();
            $table->string('province', 10)->nullable();
            $table->string('country', 10)->nullable();
            $table->string('remark', 100)->nullable();
            $table->smallInteger('subscribe')->default(0);
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
        Schema::dropIfExists('users');
    }
}
