<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jabatan')->autoIncrement();
            $table->enum('jenis_jabatan', ['Struktural', 'Fungsional']);
            $table->string('nama_jabatan');
            $table->unsignedBigInteger('id_sub_bagian');

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
        Schema::dropIfExists('jabatans');
    }
}
