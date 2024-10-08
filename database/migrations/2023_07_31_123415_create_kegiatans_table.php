<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kegiatan')->autoIncrement();
            $table->unsignedBigInteger('id_surat')->nullable();
            $table->string('nama_kegiatan');
            $table->string('inisiator');
            $table->string('bidang');
            $table->enum('jenis_kegiatan', ['Kerjakan Sendiri', 'Diserahkan Kepada Orang Lain']);
            $table->unsignedBigInteger('id')->nullable();
            $table->date('tanggal');
            $table->string('narasi');
            $table->enum('keterangan', ['dilanjutkan', 'selesai', 'belum']);
            $table->unsignedBigInteger('id_bidang_kegiatan');
            $table->unsignedBigInteger('id_indikator');
            $table->string('dokumentasi_1');
            $table->string('dokumentasi_2')->nullable();
            $table->string('dokumentasi_3')->nullable();

            $table->integer('nilai')->nullable();
            $table->string('catatan_nilai')->nullable();

            $table->foreign('id_surat')->references('id_surat')->on('surats')->onDelete('cascade');
            $table->foreign('id_indikator')->references('id_indikator')->on('indikators')->onDelete('cascade');
            $table->foreign('id')->references('id')->on('new_users')->onDelete('cascade');
            $table->foreign('id_bidang_kegiatan')->references('id_bidang_kegiatan')->on('bidang_kegiatans')->onDelete('cascade');


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
        Schema::dropIfExists('kegiatans');
    }
}
