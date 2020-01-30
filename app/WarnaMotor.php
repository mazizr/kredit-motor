<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarnaMotor extends Model
{
    protected $fillable = ['warna'];
    public $timestamps = true;

    public function motor()
    {
        return $this->hasMany('App\Motor', 'id_motor');
    }

}
