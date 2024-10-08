<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKlasifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_klasifikasis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sub_klasifikasi')->autoIncrement();
            $table->unsignedBigInteger('id_klasifikasi');
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasis')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('kode_sub_klasifikasi');
            $table->string('nama_sub_klasifikasi');
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
        Schema::dropIfExists('sub_klasifikasis');
    }
}
