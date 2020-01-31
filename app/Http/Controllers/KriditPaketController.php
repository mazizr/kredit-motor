<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KriditPaket;
use App\Motor;
use DataTables;
use Auth;

class KriditPaketController extends Controller
{
    public function index(Request $request,$id = null)
    {
        return view('Data Master.kriditpaket',compact('id'));
    }

    public function table(Request $request,$id = null)
    {
        $id = decrypt($id);
        if ($request->ajax()) {
            $data = \DB::select('SELECT *
            FROM kridit_pakets WHERE id_motor = '.$id.'');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                        if ($data) {
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData"><i class="glyphicon glyphicon-pencil"></i></a>';
                            $btn = $btn.' | <span class="label label-warning"> Dipakai</span>';
                        }else {
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData"><i class="glyphicon glyphicon-pencil"></i></a>';
                            $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData"><i class="glyphicon glyphicon-trash"></i></a>';     
                        }
                        return $btn;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}