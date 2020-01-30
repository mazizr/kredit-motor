<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliCicilan extends Model
{
    protected $fillable = ['cicilan_kode','id_kridit_kode','cicilan_tanggal','cicilan_jumlah','cicilan_ke',
    'cicilan_sisa_ke','cicilan_sisa_harga'];
    public $timestamps = true;

    public function belikridit(){
        return $this->belongsTo('App\BeliKridit', 'id_kridit');
    }
}
