<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeliCicilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_cicilans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('cicilan_kode');
            $table->unsignedInteger('id_kridit_kode');
            $table->date('cicilan_tanggal');
            $table->Integer('cicilan_jumlah');
            $table->Integer('cicilan_ke');
            $table->Integer('cicilan_sisa_ke');
            $table->double('cicilan_sisa_harga');
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
        Schema::dropIfExists('beli_cicilans');
    }
}
