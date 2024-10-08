<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_kegiatans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bidang_kegiatan')->autoIncrement();
            // $table->string('nama_bidang_kegiatan');
            $table->unsignedBigInteger('id_sub_bagian');

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('new_users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sub_bagian')->references('id_sub_bagian')->on('sub_bagians')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('bidang_kegiatans');
    }
}
