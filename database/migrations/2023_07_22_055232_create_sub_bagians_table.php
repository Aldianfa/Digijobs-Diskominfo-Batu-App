<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBagiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_bagians', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sub_bagian')->autoIncrement();
            $table->string('nama_sub_bagian');
            $table->unsignedBigInteger('id_bagian');

            $table->foreign('id_bagian')->references('id_bagian')->on('bagians')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sub_bagians');
    }
}
