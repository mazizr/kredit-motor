<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\Pembeli;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = \DB::select('SELECT *
            FROM pembelis');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                        $btn = '<span class="label label-success"> Selesai</span>';
                        return $btn;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Data Master.pembeli');
    }

    public function store(Request $request)
    {
        Pembeli::updateOrCreate(['id' => $request->kategori_id],
                ['pembeli_No_KTP' => $request->pembeli_No_KTP,
                 'pembeli_nama' => $request->pembeli_nama,
                 'pembeli_alamat' => $request->pembeli_alamat,
                 'pembeli_telepon' => $request->pembeli_telepon
                ]);        
          
        return response()->json(['success'=>'Categori saved successfully.']);
    }
}
