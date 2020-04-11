<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembeli;
use App\BeliCash;
use DB;

class SimpanPembeliCashController extends Controller
{
    public function store(Request $request)
    {
        // cek cash kode terakhir 
        $adaga = \DB::select('SELECT cash_kode 
        FROM beli_cashes
        ORDER BY cash_kode DESC LIMIT 1');
        // dd($adaga);
        if(!$adaga){
            $angka = 1;
            $kode = 'CH'.'-'.$angka;
        } else {
            // dd($adaga);
            foreach($adaga as $data){ 
                // dd($data->motor_kode); 
                $isi = $data->cash_kode; 
            }
            // dd($isi);
            $pisah = explode('-', $isi);
            // dd($pisah);
            $pilih_angka = intval($pisah[1]);
            // dd($pilih_angka+1);
            $hasil = $pilih_angka+1;
            
            $kode = 'CH'.'-'.$hasil;
        }

        $tanggal = date("Y-m-d");
        
        $motor = \DB::select('SELECT motor_harga
        FROM motors WHERE id = '.$request->motor.'');
        
        foreach($motor as $data){
            $harga = $data->motor_harga;
        }
        // dd($harga);
        DB::transaction(function () use ($request,$kode,$tanggal,$harga) {
            Pembeli::updateOrCreate(
                [
                    'pembeli_No_KTP' => $request->pembeli_No_KTP,
                    'pembeli_nama' => $request->pembeli_nama,
                    'pembeli_alamat' => $request->pembeli_alamat,
                    'pembeli_telepon' => $request->pembeli_telepon
                ]
            );
            BeliCash::updateOrCreate(
                [
                    'cash_kode' => $kode,
                    'id_pembeli_No_KTP' => $request->pembeli_No_KTP,
                    'id_motor_kode' => $request->motor,
                    'cash_tanggal' => $tanggal,
                    'cash_bayar' => $harga
                ]
            );
        });
        return response()->json(['success' => 'Beli saved successfully.']);
    }
}
