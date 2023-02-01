<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IuranBulananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iuran_bulanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('bulan');
            $table->date('tahun');
            $table->string('tanggal_penerbitan');
            $table->integer('nomor_surat');
            $table->string('status');
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
        //
    }
}
