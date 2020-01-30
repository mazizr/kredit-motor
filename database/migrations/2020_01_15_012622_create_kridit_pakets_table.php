<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriditPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kridit_pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('paket_kode');
            $table->double('paket_harga_cash');
            $table->double('paket_uang_muka');
            $table->Integer('paket_jumlah_cicilan');
            $table->double('paket_bunga');
            $table->double('paket_nilai_cicilan');
            $table->unsignedInteger('id_motor');
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
        Schema::dropIfExists('kridit_pakets');
    }
}
