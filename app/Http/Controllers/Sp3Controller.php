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

    public function evaluasi_store(Request $request)
    {
        foreach ($request["item_value"] as $key => $val) {
            $data = new \App\Models\EvaluasiSp3();
            $data->sp3_id = $request["sp3_id"];
            $data->item_cd = $request["item_cd"][$key];
            $data->item_value = $val;
            $data->keterangan = $request["keterangan"][$key];
            $data->created_by = Auth::user()->id;
            $data->save();
        }
        return redirect(route('sp3.task.approval'));
    }

    public function data(Request $request)
    {
        $sp3 = \App\Models\SP3::orderBy('sp3_id', 'desc');
        if ($request["timeline_type"] == 'approval') {
            $sp3->where('proses_st', 'PROSES_ST');
            $sp3->orWhere('proses_st', 'PROSES_AT');
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
            ->addColumn('action', function ($row) {
                $check = \App\Models\EvaluasiSp3::where('sp3_id', $row->sp3_id)->get();
                if ($check->count() > 0) {
                    $action = '<a class="dropdown-item show-evaluasi" role="presentation" href="' . route('evaluasi.sp3') . '?sp_id=' . $row->sp3_id . '"> <i class="uil uil-eye"></i> Show Evaluasi</a>
                               <a class="dropdown-item approve" role="presentation" href="javascript:void(0)" data-bind=' . $row->sp3_id . '> <i class="uil uil-check"></i> Approve</a>
                               <a class="dropdown-item reject" role="presentation" href="javascript:void(0)" data-bind=' . $row->sp3_id . '> <i class="uil uil-multiply"></i> Reject</a>';
                } else {
                    $action = '<a class="dropdown-item evaluasi" role="presentation" href="javascript:void(0)" data-bind=' . $row->sp3_id . '> <i class="uil uil-check"></i> Evaluasi</a>';
                }
                if ($row->proses_st == 'PROSES_ST') {
                    $btn = '<div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true" type="button">Action
                                <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg></i>
                                <div></div>
                            </button>
                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                ' . $action . '
                            </div>
                        </div>';
                } elseif ($row->proses_st == 'PROSES_AT') {
                    $btn = '<div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true" type="button">Action
                                <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg></i>
                                <div></div>
                            </button>
                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item reject" role="presentation" href="javascript:void(0)"> <i class="uil uil-print"></i> Print SP </a>
                            </div>
                        </div>';
                } else {
                    $btn = '';
                }
                return $btn;
            })
            ->rawColumns(['action', 'proses_st'])
            ->make(true);
    }
}