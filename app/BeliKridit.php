<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliKridit extends Model
{
    protected $fillable = ['kridit_kode','id_pembeli_No_KTP','id_paket_kode','id_motor_kode','kridit_tanggal',
    'fotokopi_KTP','fotokopi_KK','fotokopi_slip_gaji'];
    public $timestamps = true;

    public function belicicilan()
    {
        return $this->hasMany('App\BeliCicilan', 'id_kridit');
    }

    public function pembeli(){
        return $this->belongsTo('App\Pembeli', 'id_pembeli');
    }

    public function motor(){
        return $this->belongsTo('App\Motor', 'id_motor');
    }

    public function kriditpaket(){
        return $this->belongsTo('App\KriditPaket', 'id_paket');
    }
}
