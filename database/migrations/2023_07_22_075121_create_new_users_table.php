<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->unsignedBigInteger('id_jabatan');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('kepegawaian', ['pns', 'non-pns'])->default('pns');
            // $table->unsignedBigInteger('id_sub_bagian');
            // $table->foreign('id_sub_bagian')->references('id_sub_bagian')->on('sub_bagians')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('level', ['admin', 'user','pejabat'])->default('user');
            $table->string('username', 50);
            $table->string('email', 50);
            $table->string('no_hp', 15);
            $table->string('password', 255);
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
        Schema::dropIfExists('new_users');
    }
}
