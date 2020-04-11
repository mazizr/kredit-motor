<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Merk;
use DataTables;
use Auth;

class MerkController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = \DB::select('SELECT *
            FROM merks'); 
            // dd($warna);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData"><i class="glyphicon glyphicon-pencil"></i></a>';
                            $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="glyphicon glyphicon-trash"></i></a>';     
                        return $btn;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Data Master.merk');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if (!isset($request->merk_id)) {
            $request->validate([
                'kode_merk' => 'required|min:3',
                'nama_merk' => 'required'
            ],
            [
                'kode_merk.required' => 'Kode Motor Harus Diisi',
                'nama_merk.required' => 'Brand Motor Harus Dipilih'
            ]
            );
        } else {
            $request->validate([
                'kode_merk' => 'required',
                'nama_merk' => 'required',
            ],
            [
                'kode_merk.required' => 'Kode Motor Harus Diisi',
                'nama_merk.required' => 'Brand Motor Harus Dipilih'
            ]
            );
        }
        

        

        if(!isset($request->merk_id)){ 
            $request->validate(['gambar_merk' => 'required'],['gambar_merk.required' => 'Gambar Motor Harus Dipilih']);
            $kode = \DB::select('SELECT kode_merk FROM merks WHERE kode_merk = "'.$request->kode_merk.'"');
            $nama = \DB::select('SELECT nama_merk FROM merks WHERE nama_merk = "'.$request->nama_merk.'"');
            // dd($kode);
            if ($kode && $nama) {
                return response()->json(['errors'=>'Telah Ada Data Yang Sama', 500]);
            }
        }

        if(isset($request->merk_id)){ 
            $cek = \DB::select('SELECT id,kode_merk FROM merks WHERE kode_merk = "'.$request->kode_merk.'" and id = "'.$request->merk_id.'"');
            $cek2 = \DB::select('SELECT kode_merk FROM merks WHERE kode_merk = "'.$request->kode_merk.'"');
            // dd($cek);
            if (!$cek && $cek2) {
                return response()->json(['errors'=>'Telah Ada Data Yang Sama', 500]);
            }
        }

        $image = $request->file('gambar_merk');

        if($image != ''){
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
        } else {
            $new_name = $request->nama_gambar;
        }
        
        Merk::updateOrCreate(['id' => $request->merk_id],
                ['kode_merk' => $request->kode_merk,
                 'nama_merk' => $request->nama_merk,
                 'gambar_merk' => $new_name,
                 'slug' => str_slug($request->nama_merk, '-')
                 ]);  
        
        return response()->json(['success'=>'Motor saved successfully.']);
    }

    public function edit($id)
    {
        $key = \DB::select('SELECT * FROM merks WHERE id = '.$id.'');
        // dd($key);
        foreach ($key as $item) {
            $data = $item;
        }
        return response()->json($data);
    }

    public function destroy($id)
    {
        Merk::find($id)->delete();

        return response()->json(['success'=>'Merk  deleted successfully.']);

    }
}
