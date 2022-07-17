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
                    <table id="datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Directorate</th>
                                <th>Division</th>
                                <th>Department</th>
                                <th>Judul Pengadaan</th>
                                <th>No Pengadaan</th>
                                <th>Sumber Dana</th>
                                <th>Jenis Kontrak</th>
                                <th>Beban Biaya</th>
                                <th>PBJ</th>
                                <th>Nilai PR</th>
                                <th>Type Tax</th>
                                <th>Nilai TAX</th>
                                <th>Start Pengadaan</th>
                                <th>End Pengadaan</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
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
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data.timeline') }}",
            columns: [
                {data: 'directorate_cd'},
                {data: 'division_cd'},
                {data: 'department_cd'},
                {data: 'judul_pengadaan'},
                {data: 'no_pengadaan'},
                {data: 'sumber_dana'},
                {data: 'jenis_kontrak'},
                {data: 'beban_biaya'},
                {data: 'pbj'},
                {data: 'nilai_pr'},
                {data: 'type_tax'},
                {data: 'nilai_tax'},
                {data: 'start_date_pengadaan'},
                {data: 'end_date_pengadaan'},
                {data: 'proses_st'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $('body').on('click', '.create-timeline', function() {
            $('#modal-timeline').modal('show')
        })
        $('body').on('click', '.save', function() {
            $('#modal-timeline').modal('hide')
        })
    })
</script>
@endpush