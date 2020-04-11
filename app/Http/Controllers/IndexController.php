<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;
use App\Merk;
use App\Pembeli;
use App\Resep;
use App\Http\Controllers\Controller;
use DataTables;
use auth;
use DB;
use PDF;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $Motor = Motor::all();
        $jumlah_motor = count($Motor);
        
        $merk = Merk::all();
        $jumlah_merk = count($merk);

        $pembeli = Pembeli::all();
        $jumlah_pembeli = count($pembeli);

        return view('welcome', compact('jumlah_motor', 'jumlah_merk', 'jumlah_pembeli'));
    }
}
