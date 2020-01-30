<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeliKriditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_kridits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('kridit_kode');
            $table->unsignedInteger('id_pembeli_No_KTP');
            $table->unsignedInteger('id_paket_kode');
            $table->unsignedInteger('id_motor_kode');
            $table->date('kridit_tanggal');
            $table->String('fotokopi_KTP');
            $table->String('fotokopi_KK');
            $table->String('fotokopi_slip_gaji');
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
        Schema::dropIfExists('beli_kridits');
    }
}
