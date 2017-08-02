<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('name', 20);
            $table->string('owner', 20);
            $table->string('phone', 20);
            $table->string('province', 20);
            $table->string('city', 20);
            $table->string('address', 100);
            $table->string('introduce');
            $table->string('img');
            $table->string('longitude', 50)->comment('经度');
            $table->string('latitude', 50)->comment('纬度');
            $table->timestamps();
            $table->index(['name', 'owner', 'phone']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
