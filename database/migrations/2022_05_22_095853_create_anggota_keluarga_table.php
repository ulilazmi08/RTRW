<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_keluarga', function (Blueprint $table) {
            $table->id();
            $table->integer('role_keluarga')->nullable();
            $table->integer('no_keluarga');
            $table->string('name')->unique();
            $table->string('no_identitas')->unique();
            $table->string('email');
            $table->string('gender');
            $table->string('rt');
            $table->string('image')->nullable();
            $table->string('alamat');
            $table->date('tgl_lahir');
            $table->string('hubungan');
            $table->string('pendidikan');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('no_rumah');
            $table->string('no_kontak');
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
        Schema::dropIfExists('anggota_keluarga');
    }
}
