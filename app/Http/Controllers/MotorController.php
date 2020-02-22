<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Motor;
use DataTables;
use Auth;

class MotorController extends Controller
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
            FROM motors'); 
            // dd($warna);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('motor_harga', function($data) {
                    return number_format($data->motor_harga,0,'','.');
                })
                ->addColumn('action', function ($data) {
                            $btn = ' <a href="/admin/kriditpaket/'.encrypt($data->id).'" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Kredit Paket" class="manage btn btn-default btn-sm manageData">Kredit</a>';
                            $btn = $btn . ' | <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData"><i class="glyphicon glyphicon-pencil"></i></a>';
                            $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="glyphicon glyphicon-trash"></i></a>';     
                        return $btn;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Data Master.motor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (!isset($request->motor_id)) {
            $request->validate([
                'motor_kode' => 'required|min:4',
                'motor_merk' => 'required',
                'motor_harga' => 'required',
                'motor_type' => 'required',
                'motor_warna_pilihan' => 'required'
            ],
            [
                'motor_kode.required' => 'Kode Motor Harus Diisi',
                'motor_merk.required' => 'Brand Motor Harus Dipilih',
                'motor_type.required' => 'Tipe Motor Harus Diisi',
                'motor_harga.required' => 'Harga Motor Harus Diisi',
                'motor_kode.min' => 'Isikan minimal 4 nilai',
                'motor_warna_pilihan.required' => 'Warna Motor Harus Dipilih',
            ]
            );
        } else {
            $request->validate([
                'motor_kode' => 'required|min:4',
                'motor_merk' => 'required',
                'motor_harga' => 'required',
                'motor_type' => 'required'
            ],
            [
                'motor_kode.required' => 'Kode Motor Harus Diisi',
                'motor_merk.required' => 'Brand Motor Harus Dipilih',
                'motor_type.required' => 'Tipe Motor Harus Diisi',
                'motor_harga.required' => 'Harga Motor Harus Diisi',
                'motor_kode.min' => 'Isikan minimal 4 nilai'
            ]
            );
        }
        

        

        if(!isset($request->motor_id)){ 
            $request->validate(['motor_gambar' => 'required'],['motor_gambar.required' => 'Gambar Motor Harus Dipilih']);
            $cek = \DB::select('SELECT motor_kode FROM motors WHERE motor_kode = "'.$request->motor_kode.'"');
            // dd($cek);
            if ($cek) {
                return response()->json(['errors'=>'Telah Ada Data Yang Sama', 500]);
            }
            $warna = $request->motor_warna_pilihan;
        }

        if(isset($request->motor_id)){ 
            $cek = \DB::select('SELECT id,motor_kode FROM motors WHERE motor_kode = "'.$request->motor_kode.'" and id = "'.$request->motor_id.'"');
            $cek2 = \DB::select('SELECT motor_kode FROM motors WHERE motor_kode = "'.$request->motor_kode.'"');
            // dd($cek);
            if (!$cek && $cek2) {
                return response()->json(['errors'=>'Telah Ada Data Yang Sama', 500]);
            }
            $warna = $request->warnanya;
        }

        // $isi = array_keys($request->motor_warna_pilihan);
        // $ok = count($isi);
        // dd($request->all());
        $image = $request->file('motor_gambar');

        if($image != ''){
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
        } else {
            $new_name = $request->nama_gambar;
        }

        
        // $harga = implode('.', $request->motor_harga);
        // dd($request->motor_harga);
        // for ($i = 0; $i < $ok; $i++) {
        //     $pilihan = $request->motor_warna_pilihan[$i];
        //     $semua[] = $pilihan;
        // }
        // $warnanya = implode(',', $semua);
        // dd($request->all());
        $satu = explode('.', $request->motor_harga);
        $harga = implode($satu);
        Motor::updateOrCreate(['id' => $request->motor_id],
                ['motor_kode' => $request->motor_kode,
                 'motor_merk' => $request->motor_merk,
                 'motor_type' => $request->motor_type,
                 'motor_warna_pilihan' => $request->motor_warna_pilihan, 
                 'motor_harga' => $harga,
                 'motor_gambar' => $new_name
                 ]);  
        
        // dd($isinya);
        return response()->json(['success'=>'Motor saved successfully.']);
    }

    public function isi($id)
    {
        $cek = \DB::select('SELECT motor_kode FROM motors WHERE motor_merk = "'.$id.'" ORDER BY motor_kode DESC LIMIT 1');
        
        if($cek==[]){
            $angka = 0001;
            if($id == 'Honda'){
                $kode = 'HND-'.$angka;
            }
            if($id == 'Yamaha'){
                $kode = 'YMH-'.$angka;
            } elseif ($id == 'Suzuki') {
                $kode= 'SZK-'.$angka;
            }
        } else {
            // dd($cek);
            foreach($cek as $data){ 
                // dd($data->motor_kode); 
                $isi = $data->motor_kode; 
            }
            // dd($isi->motor_kode);
            $pisah = explode('-', $isi);
            // dd($pisah);
            $pilih_angka = intval($pisah[1]);
            // dd($pilih_angka+1);
            $hasil = $pilih_angka+1;
            // dd($hasil);
            if($id == 'Honda'){
                $kode = 'HND-'.$hasil;
            }
            if($id == 'Yamaha'){
                $kode = 'YMH-'.$hasil;
            } elseif ($id == 'Suzuki') {
                $kode= 'SZK-'.$hasil;
            }
        }
        // dd($kode);
        return response()->json($kode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \DB::select('SELECT * FROM motors WHERE id = '.$id.'');
        foreach ($data as $diti){
            $pisah = explode(',', $diti->motor_warna_pilihan); // memisahkan ke dalam bentuk array
            // dd($pisah);
        }
        
        $doto = ['datamotor' => $diti, 'warna' => $pisah];
        // dd($motor);
        return response()->json($doto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Motor::find($id)->delete();

        return response()->json(['success'=>'Motor  deleted successfully.']);

    }
}
