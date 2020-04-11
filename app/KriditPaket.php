<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriditPaket extends Model
{
    protected $fillable = ['tenor','paket_uang_muka','paket_jumlah_cicilan','paket_bunga','paket_nilai_cicilan','id_motor'];
    public $timestamps = true;

    public function belikridit()
    {
        return $this->hasMany('App\BeliKridit', 'id_paket');
    }
}
