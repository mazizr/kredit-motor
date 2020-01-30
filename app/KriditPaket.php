<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriditPaket extends Model
{
    protected $fillable = ['paket_kode','paket_harga_cash','paket_uang_muka','paket_jumlah_cicilan',
    'paket_nilai_cicilan','id_motor'];
    public $timestamps = true;

    public function belikridit()
    {
        return $this->hasMany('App\BeliKridit', 'id_paket');
    }
}
