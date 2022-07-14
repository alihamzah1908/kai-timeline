@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Task Approval</h4>
                    <p class="sub-header">
                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                        function:
                        <code>$().DataTable();</code>.
                    </p>

                    <table id="basic-datatable" class="table dt-responsive nowrap">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>Uraian</th>
                                <th>User</th>
                                <th>Direktorat</th>
                                <th>Realisasi</th>
                                <th>Nilai RKAP</th>
                                <th>No PROC ID</th>
                                <th>No SP 3</th>
                                <th>TGL SP 3</th>
                                <th>Metode</th>
                                <th>PBJ</th>
                                <th>Keterangan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @for($i = 1; $i < 20; $i++) <tr>
                                <td>{{ $i }}</td>
                                <td>Pengadaan Lampu LED Ruang Penumpang KRL</td>
                                <td>CTP</td>
                                <td>CT</td>
                                <td>YA (DILUAR TIMELINE)</td>
                                <td> Rp1.540.328.960 </td>
                                <td>1532</td>
                                <td>003/REN-LOG/KCI/I/2022</td>
                                <td>27/01/2022</td>
                                <td>LELANG TERBUKA</td>
                                <td>SARANA</td>
                                <td>-</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true" type="button">Action
                                            <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg></i>
                                            <div></div>
                                        </button>
                                        <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" role="presentation" href="javascript:void(0)"> <i class="uil uil-check"></i> Approve</a>
                                            <a class="dropdown-item" role="presentation" href="javascript:void(0)"> <i class="uil uil-multiply"></i> Reject</a>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div> <!-- container-fluid -->
@endsection