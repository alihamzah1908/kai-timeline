@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="header-title mt-0 mb-1">Task Approval</h5>
                        </div>
                    </div>
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