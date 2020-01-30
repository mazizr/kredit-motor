<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = ['motor_kode','motor_nama','motor_merk','motor_type','motor_warna_pilihan','motor_harga','motor_gambar','id_warna'];
    public $timestamps = true;

    public function belicash()
    {
        return $this->hasMany('App\BeliCash', 'id_motor');
    }

    public function belikridit()
    {
        return $this->hasMany('App\BeliKridit', 'id_motor');
    }

    public function warna()
    {
        return $this->belongsTo('App\WarnaMotor', 'id_warna');
    }
}
