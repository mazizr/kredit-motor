<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->Integer('motor_kode');
            $table->String('motor_nama');
            $table->String('motor_merk');
            $table->String('motor_type');
            $table->String('motor_warna_pilihan');
            $table->double('motor_harga');
            $table->String('motor_gambar');
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
        Schema::dropIfExists('motors');
    }
}
