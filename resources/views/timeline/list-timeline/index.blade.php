@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="header-title mt-0 mb-1">List Timeline</h4>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <p class="sub-header">
                                <button type="button" class="create-timeline d-flex justify-content-end btn btn-success btn-sm btn-rounded">
                                    <i class="uil-plus-circle"></i> &nbsp; Create Timeline
                                </button>
                            </p>
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
<div class="modal fade" id="modal-timeline" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Create Timeline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Uraian</label>
                                <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> <!-- end summernote-editor-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Direktorat</label>
                                <input type="text" class="form-control" placeholder="Please insert direktorat" name="direktorat">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Realisasi</label>
                                <input type="text" class="form-control" placeholder="Please insert direktorat" name="realisasi">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Metode</label>
                                <select class="form-control" name="test">
                                    <option value="1">Penunjukan Langsung</option>
                                    <option value="2">Pemilihan Langsung</option>
                                    <option value="3">Pelelangan Terbuka</option>
                                </select>
                                <!-- <input type="text" class="form-control" placeholder="Please insert metode" name="metode"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nilai RUP</label>
                                <input type="text" class="form-control" placeholder="Please insert nilai rkap" name="nilai_rkap">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No PROC ID</label>
                                <input type="text" class="form-control" placeholder="Please insert no proc id" name="proc_id">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No SP 3</label>
                                <input type="text" class="form-control" placeholder="Please insert no sp 3" name="no_sp_3">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">TGL SP 3</label>
                                <input type="text" class="form-control" placeholder="Please insert tgl sp 3" name="tgl_sp_3">
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <textarea class="form-control" placeholder="Please insert keterangan"></textarea>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Metode</label>
                                <input type="text" class="form-control" placeholder="Please insert metode" name="metode">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">PBJ</label>
                                <select class="form-control" name="test">
                                    <option value="1">Sarana</option>
                                    <option value="2">Non Sarana</option>
                                </select>
                                <!-- <input type="text" class="form-control" placeholder="Please insert pbj" name="pbj"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sumber Dana</label>
                                <textarea class="form-control" placeholder="Please insert keterangan"></textarea>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Metode</label>
                                <input type="text" class="form-control" placeholder="Please insert metode" name="metode">
                            </div>
                        </div> --> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sumber Dana</label>
                                <select class="form-control" name="test">
                                    <option value="1">2022</option>
                                    <option value="2">2023</option>
                                </select>
                                <!-- <input type="text" class="form-control" placeholder="Please insert pbj" name="pbj"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <textarea class="form-control" placeholder="Please insert keterangan"></textarea>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-primary btn-rounded save">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('body').on('click', '.create-timeline', function() {
            $('#modal-timeline').modal('show')
        })
        $('body').on('click', '.save', function() {
            $('#modal-timeline').modal('hide')
        })
    })
</script>
@endpush