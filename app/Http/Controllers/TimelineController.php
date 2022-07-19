<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
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
        // dd($request->all());
        $data = new \App\Models\Timeline();
        $data->directorate_cd = Auth::user()->directorate_cd;
        $data->division_cd = Auth::user()->division_cd;
        $data->department_cd =  Auth::user()->department_cd;
        $data->judul_pengadaan = $request["judul_pengadaan"];
        $data->sumber_dana = 'RKAP ' . $request["sumber_dana"];
        $data->jenis_kontrak = $request["jenis_kontrak"];
        $data->beban_biaya = $request["beban_biaya"];
        $data->pbj = $request["pbj"];
        $data->nilai_pr = str_replace('.', '', $request["nilai_pr"]);
        $data->type_tax = $request["type_tax"];
        $data->nilai_tax = $request["nilai_tax"];
        $data->start_date_pengadaan = $request["start_date"];
        $data->end_date_pengadaan = $request["end_date"];
        $data->proses_st = $request["save"] == 'draft' ? 'PROSES_DT' : 'PROSES_ST';
        $data->created_by = Auth::user()->id;
        $data->save();
        $data2 = \App\Models\Timeline::find($data->timeline_id);
        $data2->no_pengadaan = 'OP/' . Auth::user()->division_cd  . '/' . date('Y') . '/' . $data->timeline_id;
        $data2->save();
        return response()->json(['status' => '200']);
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
        $data = \App\Models\Timeline::where('timeline_id', $request["timeline_id"])->first();
        if ($data) {
            $timeline = \App\Models\Timeline::find($request["timeline_id"]);
            $timeline->proses_st = 'PROSES_AT';
            $timeline->save();
            return response()->json(['status' => '200']);
        } else {
            return response()->json(['status' => '400']);
        }
    }

    public function reject(Request $request)
    {
        $data = \App\Models\Timeline::where('timeline_id', $request["timeline_id"])->first();
        if ($data) {
            $timeline = \App\Models\Timeline::find($request["timeline_id"]);
            $timeline->proses_st = 'PROSES_CT';
            $timeline->save();
            return response()->json(['status' => '200']);
        } else {
            return response()->json(['status' => '400']);
        }
    }

    public function data(Request $request)
    {

        $timeline = \App\Models\Timeline::orderBy('timeline_id', 'desc');
        if ($request["timeline_type"] == 'approval') {
            $timeline->where('proses_st', 'PROSES_ST');
            $timeline->orWhere('proses_st', 'PROSES_AT');
            $timeline->orWhere('proses_st', 'PROSES_CT');
        }
        $data = $timeline->get();
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
                return $row->nilai_tax . '%';
            })
            ->addColumn('start_date_pengadaan', function ($row) {
                return date('d M Y', strtotime($row->start_date_pengadaan));
            })
            ->addColumn('end_date_pengadaan', function ($row) {
                return date('d M Y', strtotime($row->end_date_pengadaan));
            })
            ->addColumn('jenis_kontrak', function ($row) {
                if ($row->type_tax == 'single_year') {
                    return 'SINGLE YEAR';
                } else if ($row->type_tax == 'multi_year') {
                    return 'MULTI YEAR';
                }
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
                if ($row->proses_st == 'PROSES_CT' || $row->proses_st == 'PROSES_AT') {
                    $btn = '';
                } else {
                    $btn = '<div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true" type="button">Action
                                <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg></i>
                                <div></div>
                            </button>
                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item approve" role="presentation" href="javascript:void(0)" data-bind=' . $row->timeline_id . '> <i class="uil uil-check"></i> Approve</a>
                                <a class="dropdown-item reject" role="presentation" href="javascript:void(0)" data-bind=' . $row->timeline_id . '> <i class="uil uil-multiply"></i> Reject</a>
                            </div>
                        </div>';
                }
                return $btn;
            })
            ->rawColumns(['action', 'proses_st'])

            ->make(true);
    }
}
