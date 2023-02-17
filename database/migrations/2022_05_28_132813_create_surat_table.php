<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim');
            $table->string('jenis_kelamin_pengirim');
            $table->string('tgl_lahir_pengirim');
            $table->string('no_ktp_pengirim');
            $table->string('kewarganegaraan_pengirim');
            $table->string('pendidikan_pengirim');
            $table->string('tempat_lahir_pengirim');
            $table->string('agama_pengirim');
            $table->string('pekerjaan_pengirim');
            $table->string('no_rumah_pengirim');
            $table->string('no_rumah_asal_pengirim');
            $table->string('alamat_pengirim');
            $table->string('alamat_asal_pengirim');
            $table->string('jenis_surat');
            $table->string('nomor_surat');
            $table->string('rt_pengirim');
            $table->string('keperluan');
            $table->integer('status');
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
        Schema::dropIfExists('surat');
    }
}
