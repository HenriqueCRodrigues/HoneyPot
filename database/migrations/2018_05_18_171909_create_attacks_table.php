<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attacks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('lat');
            $table->string('lon');

            $table->unsignedInteger('port');

            $table->string('src_ip');
            $table->string('dst_ip');


            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade');

            $table->unsignedInteger('protocol_id');
            $table->foreign('protocol_id')->references('id')->on('protocols')->onUpdate('cascade');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            $table->timestamp('date_time');
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
        Schema::dropIfExists('attacks');
    }
}
