<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_kegiatans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_log')->autoIncrement();
            $table->unsignedBigInteger('id_kegiatan');
            $table->unsignedBigInteger('id_bidang_kegiatan');
            $table->unsignedBigInteger('id_indikator');
            $table->unsignedBigInteger('id_surat')->nullable();
            $table->unsignedBigInteger('id')->nullable();
            $table->string('inisiator');
            $table->string('bidang');
            $table->date('tanggal_kegiatan');
            $table->enum('status', ['diterima', 'belum dibuka']);
            $table->enum('keterangan', ['dilanjutkan', 'selesai', 'belum']);
            $table->string('narasi');
            $table->string('dokumentasi_1');
            $table->string('dokumentasi_2')->nullable();

            $table->integer('nilai')->nullable();
            $table->string('catatan_nilai')->nullable();

            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatans')->onDelete('cascade');
            $table->foreign('id_bidang_kegiatan')->references('id_bidang_kegiatan')->on('bidang_kegiatans')->onDelete('cascade');
            $table->foreign('id')->references('id')->on('new_users')->onDelete('cascade');
            $table->foreign('id_indikator')->references('id_indikator')->on('indikators')->onDelete('cascade');
            $table->foreign('id_surat')->references('id_surat')->on('surats')->onDelete('cascade');

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
        Schema::dropIfExists('log_kegiatans');
    }
}
