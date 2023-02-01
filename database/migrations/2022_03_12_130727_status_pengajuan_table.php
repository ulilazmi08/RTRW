<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('perihal');
            $table->date('tanggal_pengajuan');
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
