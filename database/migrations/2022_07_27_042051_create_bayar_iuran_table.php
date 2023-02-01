<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarIuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar_iuran', function (Blueprint $table) {
            $table->id();
            $table->string('id_iuran');
            $table->string('nama_pembayar');
            $table->string('nominal');
            $table->string('bukti')->nullable();
            $table->string('via');
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
        Schema::dropIfExists('bayar_iuran');
    }
}
