<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('rt_id');
            $table->integer('no_relasi_sebelum')->nullable();
            $table->integer('no_relasi_sesudah')->nullable();
            $table->string('gender');
            $table->string('image_ktp')->nullable();
            $table->string('image_kk')->nullable();
            $table->string('alamat');
            $table->string('alamat_asal');
            $table->string('tempat_lahir');
            $table->string('kewarganegaraan');
            $table->date('tgl_lahir');
            $table->string('status');
            $table->string('peran_keluarga')->nullable();
            $table->string('pendidikan');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('no_rumah');
            $table->string('no_rumah_asal');
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
        Schema::dropIfExists('profil');
    }
}
