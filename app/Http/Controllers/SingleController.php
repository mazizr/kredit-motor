<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class SingleController extends Controller
{

    public function index(Request $request,$motor = null)
    {
        $data = \DB::select('SELECT * FROM kridit_pakets AS k
        LEFT JOIN motors AS m ON m.id = k.id_motor 
        WHERE m.slug = "'.$motor.'"');
        foreach($data as $diti){
           $semua = $diti;
        }
        // dd($semua);
        return view('FrontEnd.single',compact('semua','data'));
    }
}
