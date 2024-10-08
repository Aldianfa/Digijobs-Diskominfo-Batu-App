<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBagiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagians', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bagian')->autoIncrement();
            $table->string('nama_bagian', 50);
            // $table->unsignedBigInteger('id_jabatan');
            // $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_jabatan')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('bagians');
    }
}
