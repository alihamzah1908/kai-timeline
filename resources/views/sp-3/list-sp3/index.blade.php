@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="header-title mt-0 mb-1">List SP 3</h4>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <p class="sub-header">
                                <button type="button" class="create-sp-3 d-flex justify-content-end btn btn-success btn-sm btn-rounded">
                                    <i class="uil-plus-circle"></i> &nbsp; Create SP 3
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
                                <th>Relisasi</th>
                                <th>Judul Pengadaan</th>
                                <th>Nilai PR</th>
                                <th>Type Tax</th>
                                <th>Nilai TAX</th>
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
                <h5 class="modal-title" id="myLargeModalLabel">Create SP 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form-timeline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Realisasi</label><br />
                            <input type="radio" name="realisasi" class="realisasi" value="ya"> YES (TIMELINE)
                            <input type="radio" name="realisasi" class="realisasi" value="no"> NO (NO TIMELINE)
                        </div>
                    </div>
                    <div class="row row-timeline">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Timeline</label>
                                <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                                @php
                                $timeline = \App\Models\Timeline::select('timeline_id','judul_pengadaan')->where('proses_st', 'PROSES_AT')->get();
                                @endphp
                                <select data-plugin="customselect" class="form-control" name="timeline_id">
                                    @foreach($timeline as $val)
                                    <option value="{{ $val->timeline_id }}">{{ $val->judul_pengadaan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row judul-pengadaan">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul Pengadaan</label>
                                <input type="text" class="form-control" placeholder="Please insert judul pengadaan" name="judul_pengadaan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">No SP3</label>
                            <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                            <input type="text" name="nomor_sp3" class="form-control" placeholder="Please insert no sp3">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Metode</label>
                            <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                            <input type="text" name="metode" class="form-control" placeholder="Please insert metode">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vendor Name</label>
                                <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                                <input type="text" name="vendor_name" class="form-control" placeholder="Please insert no mi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No MI</label>
                                <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                                <input type="text" name="no_mi" class="form-control" placeholder="Please insert no mi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No PR/IP</label>
                                <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                                <input type="text" name="no_pr_ip" class="form-control" placeholder="Please insert pr/ip">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Justifikasi</label>
                                <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                                <input type="text" name="no_justifikasi" class="form-control" placeholder="Please insert nomor justifikasi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No RAB</label>
                                <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                                <input type="text" name="no_rab" class="form-control" placeholder="Please insert nomor rab">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No KAK</label>
                                <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                                <input type="text" name="no_kak" class="form-control" placeholder="Please insert nomor kak">
                            </div>
                        </div>
                    </div>
                    <div class="timeline">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nilai PR</label>
                                    <!-- <select class="form-control" name="test">
                                    <option value="1">2022</option>
                                    <option value="2">2023</option>
                                </select> -->
                                    <input type="text" class="form-control" placeholder="Please insert nilai_pr" name="nilai_pr">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type TAX</label>
                                    <select class="form-control" name="type_tax">
                                        <option value="1">Pajak Dipungut, Pajak Dipungut Sebagian, Tidak Dipungut</option>
                                        <option value="2">Pajak Dipungut (11% dari PR)</option>
                                        <option value="3">Pajak Dipungut Sebgaian (Input Manual)</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" placeholder="Please insert pbj" name="jenis_kontrak"> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nilai TAX</label>
                                    <!-- <select class="form-control" name="test">
                                    <option value="1">2022</option>
                                    <option value="2">2023</option>
                                </select> -->
                                    <input type="text" class="form-control" placeholder="Please insert nilai tax" name="nilai_tax">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Keterangan</label>
                                    <textarea class="form-control" placeholder="Please insert keterangan" name="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-primary btn-rounded save" type="button">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        var timeline = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data.sp3') }}",
            columns: [{
                    data: 'directorate_cd'
                },
                {
                    data: 'division_cd'
                },
                {
                    data: 'department_cd'
                },
                {
                    data: 'realisasi'
                },
                {
                    data: 'judul_pengadaan'
                },
                {
                    data: 'nilai_pr'
                },
                {
                    data: 'type_tax'
                },
                {
                    data: 'nilai_tax'
                },
                {
                    data: 'proses_st'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('body').on('click', '.realisasi', function() {
            var data = $(this).val()
            console.log(data)
            if (data == 'no') {
                $(".row-timeline").hide();
                $(".timeline").show();
                $(".judul-pengadaan").show();
            } else if (data == 'ya') {
                $(".row-timeline").show();
                $(".timeline").hide();
                $(".judul-pengadaan").hide();
            }
        })
        $('body').on('click', '.save', function() {
            var data = $('#form-timeline').serialize();
            $.ajax({
                url: '{{ route("sp3.store") }}',
                dataType: 'json',
                method: 'post',
                data: data
            }).done(function(response) {
                if (response.status == '200') {
                    $('#modal-timeline').modal('hide')
                    timeline.ajax.reload()
                }
            })
        })
        $('body').on('click', '.create-sp-3', function() {
            $('#modal-timeline').modal('show')
        })
        $('body').on('click', '.approve', function() {
            Swal.fire({
                title: 'Are you sure approve timeline?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Approve'
            }).then((result) => {
                if (result.isConfirmed) {
                    var sp_3_id = $(this).attr('data-bind');
                    $.ajax({
                        url: '{{ route("sp3.approve") }}',
                        dataType: 'json',
                        method: 'get',
                        data: {
                            'sp3_id': sp_3_id
                        }
                    }).done(function(response) {
                        if (response.status == '200') {
                            Swal.fire(
                                'Approved!',
                                'Your timeline has approved.',
                                'success'
                            )
                            timeline.ajax.reload()
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Your timeline failed approved.',
                                'success'
                            )
                        }
                    })

                }
            })
        })

        $('body').on('click', '.reject', function() {
            Swal.fire({
                title: 'Are you sure reject timeline?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Reject'
            }).then((result) => {
                if (result.isConfirmed) {
                    var sp_3_id = $(this).attr('data-bind');
                    $.ajax({
                        url: '{{ route("sp3.reject") }}',
                        dataType: 'json',
                        method: 'get',
                        data: {
                            'sp3_id': sp_3_id
                        }
                    }).done(function(response) {
                        if (response.status == '200') {
                            Swal.fire(
                                'Rejected!',
                                'Your timeline has rejected.',
                                'success'
                            )
                            timeline.ajax.reload()
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Your timeline failed reject.',
                                'success'
                            )
                        }
                    })

                }
            })
        })
    })
</script>
@endpush