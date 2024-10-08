<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->unsignedBigInteger('id_surat')->autoIncrement();
            $table->unsignedBigInteger('id_sub_klasifikasi');
            $table->foreign('id_sub_klasifikasi')->references('id_sub_klasifikasi')->on('sub_klasifikasis')->onDelete('cascade');

            $table->string('nomor_surat', 50);

            $table->unsignedBigInteger('id_skpd')->nullable();
            $table->foreign('id_skpd')->references('id_skpd')->on('skpds')->onDelete('cascade');

            $table->string('inisiator');
            // $table->string('asal_surat');
            $table->enum('status_surat', ['On Progress', 'Selesai'])->default('On Progress');   
            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('new_users')->onDelete('cascade');
            
            $table->date('tanggal_terima');
            $table->string('perihal');
            $table->string('file_surat');
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
        Schema::dropIfExists('surats');
    }
}
