<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeliCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_cashes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('cash_kode');
            $table->unsignedInteger('id_pembeli_No_KTP');
            $table->unsignedInteger('id_motor_kode');
            $table->date('cash_tanggal');
            $table->double('cash_bayar');
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
        Schema::dropIfExists('beli_cashes');
    }
}
