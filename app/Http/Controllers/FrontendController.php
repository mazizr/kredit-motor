<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Motor;
use App\Merk;

class FrontendController extends Controller
{
    
    public function index()
    {
        $motor = \DB::select('SELECT DISTINCT(m.id), m.motor_kode , m.motor_merk, m.motor_type, m.motor_warna_pilihan, m.motor_harga, m.motor_gambar, m.id_merk, m.slug
        FROM kridit_pakets AS kp 
        LEFT JOIN motors AS m ON m.id = kp.id_motor');
        $merk = Merk::all();
        return view('FrontEnd.home', compact('motor','merk'));
    }

    public function trending()
    {
        $data = \DB::select('SELECT * FROM motors');
        // dd($data);
        return response()->json($data); 
    }

    public function shop()
    {
        $motor = Motor::all();
        return view('FrontEnd.shop', compact('motor'));
    }

    public function about()
    {
        return view('FrontEnd.about');
    }

    public function blog()
    {
        return view('FrontEnd.blog');
    }

    public function contact()
    {
        return view('FrontEnd.contact');
    }

    public function brand($motor = null)
    {
        // dd($motor);
        $motor = \DB::select('SELECT m.id, m.motor_kode, m.motor_merk, m.motor_type, m.motor_warna_pilihan, m.motor_harga, m.motor_gambar
        FROM motors AS m 
        LEFT JOIN merks AS mk ON mk.id = m.motor_merk 
        WHERE mk.slug = "'.$motor.'"');

    return view('FrontEnd.shop', compact('motor'));
    }

    public function belicash($motor = null)
    {
        
        $motor = \DB::select('SELECT * FROM motors
        WHERE slug = "'.$motor.'"');
        foreach($motor as $diti){
            $semua = $diti;
         }
        return view('FrontEnd.belicash', compact('semua'));
    }

    public function belicicilan($motor = null)
    {
        
        $motor = \DB::select('SELECT * FROM motors
        WHERE slug = "'.$motor.'"');
        foreach($motor as $diti){
            $semua = $diti;
         }
        return view('FrontEnd.belicicilan', compact('semua'));
    }

    public function simpancash(Request $request)
    {
        dd($request->all());
    }

}
