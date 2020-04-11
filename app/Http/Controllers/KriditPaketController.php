<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KriditPaket;
use App\Motor;
use DataTables;
use Auth;
use DB;

class KriditPaketController extends Controller
{
    public function index(Request $request,$id = null)
    {
        return view('Data Master.kriditpaket',compact('id'));
    }

    public function table(Request $request,$id = null)
    {
        $id = decrypt($id);
        // dd($id);
        if ($request->ajax()) {
            $data = \DB::select('SELECT *
            FROM kridit_pakets WHERE id_motor = '.$id.'');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('paket_uang_muka', function($data) {
                    return number_format($data->paket_uang_muka,0,'','.');
                })
                ->addColumn('paket_jumlah_cicilan', function($data) {
                    return number_format($data->paket_jumlah_cicilan,0,'','.');
                })
                ->addColumn('paket_nilai_cicilan', function($data) {
                    return number_format($data->paket_nilai_cicilan,0,'','.');
                })
                ->addColumn('action', function ($data) {
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData"><i class="glyphicon glyphicon-pencil"></i></a>';
                            $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="glyphicon glyphicon-trash"></i></a>';     
                        
                        return $btn;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function append(Request $request)
    {
        $request->validate(
            [
                'paket_kode.*' => 'required'
            ]
        );

        return response()->json('success');
    }

    public function store(Request $request)
    {
        $isi = array_keys($request->tenor);
        $ok = count($isi);
        // dd($ok);
        // dd($request->all());
        DB::transaction(function () use ($request,$ok) {
            for ($i = 0; $i < $ok; $i++) {
                // PAKET UANG MUKA
                $pisah_paket_uang_muka = explode('.',$request->paket_uang_muka[$i]);
                $paket_uang_muka = intval(implode($pisah_paket_uang_muka));
                // PAKET JUMLAH CICILAN
                $pisah_paket_jumlah_cicilan = explode('.',$request->paket_jumlah_cicilan[$i]);
                $paket_jumlah_cicilan = intval(implode($pisah_paket_jumlah_cicilan));
                // PAKET_BUNGA
                $pisah_paket_bunga = explode('.',$request->paket_bunga[$i]);
                $paket_bunga = intval(implode($pisah_paket_bunga));
                // PAKET NILAI CICILAN
                $pisah_paket_nilai_cicilan = explode('.',$request->paket_nilai_cicilan[$i]);
                $paket_nilai_cicilan = intval(implode($pisah_paket_nilai_cicilan));

                KriditPaket::updateOrCreate(
                    ['id' => $request->kreditpaket_id],
                    [
                        'paket_uang_muka' => $paket_uang_muka,
                        'paket_jumlah_cicilan' => $paket_jumlah_cicilan,
                        'paket_bunga' => $paket_bunga,
                        'paket_nilai_cicilan' => $paket_nilai_cicilan,
                        'tenor' => $request->tenor[$i],
                        'id_motor' => decrypt($request->id_motor)
                    ]
                );
            }
        });
        return response()->json(['success'=>'Motor saved successfully.']);
    }
    
    public function isi($id)
    {
        // dd($id);
        $pisah = explode("|", $id);
        $id_motor = decrypt($pisah[0]);
        $tenor = intval($pisah[1]);
        
        $motor = \DB::select('SELECT motor_harga
            FROM motors WHERE id = '.$id_motor.'');
        foreach ($motor as $key) {
            $harga_motor = $key->motor_harga;
        }

        $paket_uang_muka = 0.045*$harga_motor;
        // dd($paket_uang_muka);
        if($tenor == 36){
            $paket_bunga = 50;
            $penambahan = 0.5*$harga_motor;
            $paket_jumlah_cicilan = $harga_motor+$penambahan;
            $paket_nilai_cicilan = $paket_jumlah_cicilan/36;
            $paket_uang_muka = 0.045*$harga_motor;
        } elseif($tenor == 24){
            $paket_bunga = 40;
            $penambahan = 0.4*$harga_motor;
            $paket_jumlah_cicilan = $harga_motor+$penambahan;
            $paket_nilai_cicilan = $paket_jumlah_cicilan/24;
            $paket_uang_muka = 0.03*$harga_motor;
        } else {
            $paket_bunga = 30;
            $penambahan = 0.3*$harga_motor;
            $paket_jumlah_cicilan = $harga_motor+$penambahan;
            $paket_nilai_cicilan = $paket_jumlah_cicilan/12;
            $paket_uang_muka = 0.035*$harga_motor;
        }
        // dd($paket_nilai_cicilan);
        $data = ['paket_uang_muka' => round($paket_uang_muka, 0), 'paket_nilai_cicilan' => round($paket_nilai_cicilan, 0), 'paket_jumlah_cicilan' => round($paket_jumlah_cicilan, 0), 'paket_bunga' => round($paket_bunga, 0)];

        return response()->json($data);
    }

    public function edit($id)
    {
        $paket = \DB::select('SELECT * FROM kridit_pakets WHERE id = '.$id.'');
        foreach ($paket as $key) {
            $data = $key;
        }
        // dd($data);
        return response()->json($data);
    }

    public function destroy($id)
    {
        KriditPaket::find($id)->delete();

        return response()->json(['success'=>'Kridit Paket  deleted successfully.']);

    }

}