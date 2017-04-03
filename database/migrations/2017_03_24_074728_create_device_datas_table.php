<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_id')->default('007');
            $table->boolean('is_animal')->default(1);
            $table->boolean('is_car')->default(1);
            $table->integer('temperature')->default(10);
            $table->integer('decibel')->default(80);
            $table->string('latitude')->default('37.482424');
            $table->string('longitude')->default('127.035411');
            $table->string('animal_name');
            $table->string('photo');
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
        Schema::dropIfExists('device_datas');
    }
}
