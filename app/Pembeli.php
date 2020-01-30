<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $fillable = ['pembeli_No_KTP','pembeli_nama','pembeli_alamat','pembeli_telepon'];
    public $timestamps = true;

    public function belicash()
    {
        return $this->hasMany('App\BeliCash', 'id_pembeli');
    }

    public function belikridit()
    {
        return $this->hasMany('App\BeliKridit', 'id_pembeli');
    }
}
