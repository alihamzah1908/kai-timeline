@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-left mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('sp3.task.approval') }}">SP3 Task Approval</a></li>
                    <li class="breadcrumb-item"><a href="#">Evaluasi</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h4 class="header-title mt-0 mb-1">Evaluasi SP3</h4>
                        </div>
                    </div>
                    @php
                    $evaluasi = \App\Models\SP3::where('sp3_id', request()->sp_id)->first();
                    @endphp
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <th align="left" width="200">
                                        JUDUL PENGADAAN
                                    </th>
                                    <th width="20">
                                        :
                                    </th>
                                    <th>{{ $evaluasi->judul_pengadaan }}</th>
                                </tr>
                                <tr>
                                    <th align="left">
                                        NO ID
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <th>1610</th>
                                </tr>
                                <tr>
                                    <th align="left">
                                        NILAI
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <th>{{ number_format($evaluasi->nilai_pr, 2) }}</th>
                                </tr>
                                <tr>
                                    <th align="left">
                                        UNIT
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <th>{{ $evaluasi->directorate_cd . '/' . $evaluasi->division_cd . '/' . $evaluasi->department_cd }}</th>
                                </tr>
                                <tr>
                                    <th align="left">
                                        METODE PENGADAAN
                                    </th>
                                    <th>
                                        :
                                    </th>
                                    <th>{{ $evaluasi->type_metode }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <table id="tablel-evaluasi" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>URAIAN DOKUMEN</th>
                                <th>NOMOR</th>
                                <th>TANGGAL</th>
                                <th></th>
                                <th></th>
                                <th>KETERANGAN/KELENGKAPAN/KESESUAIAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $evaluasi = \App\Models\EvaluasiSp3::where('sp3_id', request()->sp_id)->get();
                            $i = 1;
                            @endphp
                            @foreach($evaluasi as $val)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $val->item_value }}</td>
                                <td></td>
                                <td>{{ date('d M Y', strtotime($val->created_at)) }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $val->keterangan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>
@endsection