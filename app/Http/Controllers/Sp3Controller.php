<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class Sp3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if ($request["realisasi"] == 'ya') {
            $timeline = \App\Models\Timeline::where('timeline_id', $request["timeline_id"])->first();
        } else {
            $timeline = false;
        }
        $data = new \App\Models\SP3();
        $data->timeline_id = $timeline ? $timeline->timeline_id : NULL;
        $data->directorate_cd = $timeline ? $timeline->directorate_cd : Auth::user()->directorate_cd;
        $data->division_cd = $timeline ? $timeline->division_cd : Auth::user()->division_cd;
        $data->department_cd =  $timeline ? $timeline->department_cd : Auth::user()->department_cd;;
        $data->judul_pengadaan = $timeline ? $timeline->judul_pengadaan : $request["judul_pengadaan"];
        $data->no_sp3 = $request["nomor_sp3"];
        // $data->sumber_dana =  $timeline ? $timeline->sumber_dana : $request["sumber_dana"];
        // $data->jenis_kontrak =  $timeline ? $timeline->jenis_kontrak : $request["jenis_kontrak"];
        // $data->beban_biaya =  $timeline ? $timeline->beban_biaya : $request["beban_biaya"];
        // $data->pbj =  $timeline ? $timeline->pbj : $request["pbj"];
        $data->nilai_pr =  $timeline ? $timeline->nilai_pr : $request["nilai_pr"];
        $data->type_tax =  $timeline ? $timeline->type_tax : $request["type_tax"];
        $data->nilai_tax =  $timeline ? $timeline->nilai_tax : $request["nilai_tax"];
        $data->tanggal_pr =  date('Y-m-d H:i:s');
        $data->type_metode =  $request["type_metode"];
        $data->tanggal_justifikasi = date('Y-m-d H:i:s');
        $data->tanggal_rab =  date('Y-m-d H:i:s');
        $data->tanggal_pr =  date('Y-m-d H:i:s');
        $data->tanggal_kak =  date('Y-m-d H:i:s');
        $data->nama_vendor = $request["vendor_name"];
        $data->no_mi = $request["no_mi"];
        $data->no_rab = $request["no_mi"];
        $data->no_justifikasi = $request["no_justifikasi"];
        $data->no_kak = $request["no_kak"];
        $data->no_pr = $request["no_pr_ip"];
        $data->proses_st = $request["save"] == 'Save As Draft' ? 'PROSES_DT' : 'PROSES_ST';
        $data->keterangan = 'KETERANGAN';
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            foreach ($file as $val) {
                $files = new \App\Models\SP3_File();
                $files->sp3_id = $data->sp3_id;
                $extension = $val->getClientOriginalExtension();
                $new_name = 'SP3' . "-" . now()->format('Y-m-d-H-i-s') . "." . $extension;
                $val->move(public_path('file/sp3'), $new_name);
                $files->file = $new_name;
                $files->save();
            }
        }
        return redirect(route('list.sp3'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function approve(Request $request)
    {
        $data = \App\Models\SP3::where('sp3_id', $request["sp3_id"])->first();
        if ($data) {
            $timeline = \App\Models\SP3::find($request["sp3_id"]);
            $timeline->proses_st = 'PROSES_AT';
            $timeline->save();
            return response()->json(['status' => '200']);
        } else {
            return response()->json(['status' => '400']);
        }
    }

    public function reject(Request $request)
    {
        $data = \App\Models\Timeline::where('sp3_id', $request["sp3_id"])->first();
        if ($data) {
            $timeline = \App\Models\Timeline::find($request["sp3_id"]);
            $timeline->proses_st = 'PROSES_CT';
            $timeline->save();
            return response()->json(['status' => '200']);
        } else {
            return response()->json(['status' => '400']);
        }
    }

    public function data(Request $request)
    {
        $sp3 = \App\Models\SP3::orderBy('sp3_id', 'desc');
        if ($request["timeline_type"] == 'approval') {
            $sp3->where('proses_st', 'PROSES_ST');
        }
        $data = $sp3->get();
        return Datatables::of($data)
            ->addColumn('nilai_pr', function ($row) {
                return number_format($row->nilai_pr, 2);
            })
            ->addColumn('type_tax', function ($row) {
                if ($row->type_tax == '1') {
                    return 'Pajak Tidak Dipungut';
                } else if ($row->type_tax == '2') {
                    return 'Pajak Dipungut (11%)';
                } else if ($row->type_tax == '3') {
                    return 'Pajak Dipungut Sebagian';
                }
            })
            ->addColumn('nilai_tax', function ($row) {
                return number_format($row->nilai_tax, 2);
            })
            ->addColumn('start_date_pengadaan', function ($row) {
                return date('d M Y', strtotime($row->start_date_pengadaan));
            })
            ->addColumn('end_date_pengadaan', function ($row) {
                return date('d M Y', strtotime($row->end_date_pengadaan));
            })
            ->addColumn('realisasi', function ($row) {
                return $row->timeline_id != '' ? 'YES (TIMELINE)' : 'NO (TIMELINE)';
            })
            ->addColumn('proses_st', function ($row) {
                if ($row->proses_st == 'PROSES_DT') {
                    return '<badges class="badge badge-warning">Draft Timeline</badges>';
                } else if ($row->proses_st == 'PROSES_AT') {
                    return '<badges class="badge badge-success">Approved Timeline</badges>';
                } else if ($row->proses_st == 'PROSES_CT') {
                    return '<badges class="badge badge-danger">Canceled Timeline</badges>';
                } else if ($row->proses_st == 'PROSES_ST') {
                    return '<badges class="badge badge-primary">Submitted Timeline</badges>';
                }
            })
            ->rawColumns(['action', 'proses_st'])
            ->make(true);
    }
}
