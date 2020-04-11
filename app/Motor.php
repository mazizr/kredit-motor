<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = ['motor_kode','motor_nama','motor_merk','motor_type','motor_warna_pilihan','motor_harga','motor_gambar','id_merk','slug'];
    public $timestamps = true;

    public function belicash()
    {
        return $this->hasMany('App\BeliCash', 'id_motor');
    }

    public function belikridit()
    {
        return $this->hasMany('App\BeliKridit', 'id_motor');
    }

    public function merk()
    {
        return $this->belongsTo('App\Merk', 'id_merk');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
