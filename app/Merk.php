<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $fillable = ['kode_merk','nama_merk','gambar_merk','slug'];
    public $timestamps = true;

    public function motor()
    {
        return $this->hasMany('App\Motor', 'id_merk');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
