<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliCash extends Model
{
    protected $fillable = ['cash_kode','id_pembeli_No_KTP','id_motor_kode','cash_tanggal','cash_bayar'];
    public $timestamps = true;
    
    public function pembeli(){
        return $this->belongsTo('App\Pembeli', 'id_pembeli');
    }

    public function motor(){
        return $this->belongsTo('App\Motor', 'id_motor');
    }
}
