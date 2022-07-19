@extends('layouts.master')
@section('content')
<style>
    element {
        height: 100px;
    }
</style>
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
                                <!-- <th></th> -->
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
                <form action="#" id="form-timeline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul Pengadaan</label>
                                <!-- <div id="summernote-editor">
                                    <p>Uraian Details</p>
                                </div> end summernote-editor -->
                                <textarea name="judul_pengadaan" class="form-control" placeholder="Please insert judul pengadaan"></textarea>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Pengadaan</label>
                                <input type="text" name="nomor_pengadaan" class="form-control" placeholder="Please insert no pengadaan">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Beban Biaya</label>
                                <select class="form-control" name="beban_biaya">
                                    <option value="CAPEX">Capex</option>
                                    <option value="OPEX">Opex</option>
                                </select>
                                <!-- <input type="text" class="form-control" placeholder="Please insert metode" name="metode"> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Beban Biaya</label>
                                <select class="form-control" name="beban_biaya">
                                    <option value="Penunjukan Langsung">Penunjukan Langsung</option>
                                    <option value="Pemilihan Langsung">Pemilihan Langsung</option>
                                    <option value="Pelelangan Terbuka">Pelelangan Terbuka</option>
                                </select>
                                <input type="text" class="form-control" placeholder="Please insert metode" name="metode">
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="row">
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
                    </div> -->
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
                                <label for="exampleInputEmail1">PBJ</label>
                                <select class="form-control" name="pbj">
                                    <option value="Sarana">Sarana</option>
                                    <option value="Non Sarana">Non Sarana</option>
                                </select>
                                <!-- <input type="text" class="form-control" placeholder="Please insert pbj" name="pbj"> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sumber Dana</label>
                                <select class="form-control" name="sumber_dana">
                                    <option value="2022">2021</option>
                                    <option value="2023">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                                <!-- <input type="text" class="form-control" placeholder="Please insert pbj" name="pbj"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kontrak</label>
                                <br />
                                <input type="radio" class="jenis_kontrak" name="jenis_kontrak" value="single_year"> Single Year
                                <input type="radio" class="jenis_kontrak" name="jenis_kontrak" value="multi_year"> Multi Year
                            </div>
                        </div>
                        <div class="col-md-6 jenis_kontrak_year" style="display: none;">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Year</label>
                                <select class="form-control">
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Nilai PR</label>
                            <input type="text" class="form-control money nilai-pr" placeholder="Please insert nilai_pr" name="nilai_pr">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type TAX</label>
                                <select class="form-control type-tax" name="type_tax">
                                    <option value="">Pilih</option>/option>
                                    <option value="1">Pajak Tidak Dipungut</option>
                                    <option value="2">Pajak Dipungut</option>
                                    <option value="3">Pajak Dipungut Sebagian</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 nilai-tax border">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nilai TAX</label>
                                <input type="text" class="form-control nilai-tax-value" placeholder="Please insert nilai tax" disabled>
                                <input type="hidden" class="form-control nilai-tax-insert" placeholder="Please insert nilai tax" name="nilai_tax">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Start Date Pengadaan</label>
                                <input type="date" class="form-control" placeholder="Please insert start date" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">End Date Pengadaan</label>
                                <input type="date" class="form-control" placeholder="Please insert end date" name="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <textarea class="form-control" placeholder="Please insert keterangan" name="keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" name="save" id="save" value="">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-warning btn-rounded save" data-bind="draft" type="button">Save as Draft</button>
                            <button class="btn btn-primary btn-rounded ml-2 save" data-bind="submit" type="button">Submit</button>
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
            ajax: "{{ route('data.timeline') }}",
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
                    data: 'judul_pengadaan'
                },
                {
                    data: 'no_pengadaan'
                },
                {
                    data: 'sumber_dana'
                },
                {
                    data: 'jenis_kontrak'
                },
                {
                    data: 'beban_biaya'
                },
                {
                    data: 'pbj'
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
                    data: 'start_date_pengadaan'
                },
                {
                    data: 'end_date_pengadaan'
                },
                {
                    data: 'proses_st'
                },
                // {
                //     data: 'action',
                //     name: 'action',
                //     orderable: false,
                //     searchable: false
                // },
            ]
        });
        $('body').on('click', '.create-timeline', function() {
            $('#modal-timeline').modal('show')
        })
        $('body').on('click', '.save', function() {
            var data = $('#form-timeline').serialize();
            var type = $(this).attr('data-bind');
            $('#save').val(type)
            $.ajax({
                url: '{{ route("timeline.store") }}',
                dataType: 'json',
                method: 'post',
                data: data
            }).done(function(response) {
                if (response.status == '200') {
                    $('#modal-timeline').modal('hide')
                    timeline.ajax.reload();
                    $('#form-timeline')[0].reset();
                }
            })
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
                    var timeline_id = $(this).attr('data-bind');
                    $.ajax({
                        url: '{{ route("timeline.approve") }}',
                        dataType: 'json',
                        method: 'get',
                        data: {
                            'timeline_id': timeline_id
                        }
                    }).done(function(response) {
                        if (response.status == '200') {
                            Swal.fire(
                                'Approved!',
                                'Your timeline has approved.',
                                'success'
                            )
                            timeline.ajax.reload();
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
                    var timeline_id = $(this).attr('data-bind');
                    $.ajax({
                        url: '{{ route("timeline.reject") }}',
                        dataType: 'json',
                        method: 'get',
                        data: {
                            'timeline_id': timeline_id
                        }
                    }).done(function(response) {
                        if (response.status == '200') {
                            Swal.fire(
                                'Rejected!',
                                'Your timeline has rejected.',
                                'success'
                            )
                            timeline.ajax.reload();
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Your timeline failed rejected.',
                                'success'
                            )
                        }
                    })

                }
            })
        })
        $('body').on('click', '.jenis_kontrak', function() {
            var jenis = $(this).val()
            if (jenis == 'multi_year') {
                $(".jenis_kontrak_year").show()
            } else if (jenis == 'single_year') {
                $(".jenis_kontrak_year").hide()
            }
        })
        $('body').on('change', '.type-tax', function() {
            var nilai_pr = $(".nilai-pr").val()
            var new_nilai_pr = nilai_pr.replace(/\./g, '')
            var jenis = $(this).val()
            if (jenis == '1') {
                const format = new_nilai_pr.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                const rupiah = convert.join('.').split('').reverse().join('')
                $(".nilai-tax").show()
                $(".nilai-tax-value").val('0')
                $(".nilai-tax-insert").val('0')
                $(".nilai-pr").val(rupiah)
                $(".nilai-tax-value").prop('disabled', true)
            } else if (jenis == '2') {
                var persen = (11 / 100);
                var total = parseInt(new_nilai_pr) * persen
                var totalFix = parseInt(new_nilai_pr) - total
                const format = totalFix.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                const rupiah = convert.join('.').split('').reverse().join('')
                $(".nilai-tax").show()
                $(".nilai-tax-value").val('11')
                $(".nilai-tax-insert").val('11')
                $(".nilai-tax-percent").html('%')
                $(".nilai-pr").val(rupiah)
                $(".nilai-tax-value").prop('disabled', true)
            } else if (jenis == '3') {
                $(".nilai-tax").show()
                $(".nilai-tax-value").prop('disabled', false)
                $(".nilai-tax-value").val(' ')
                $(".nilai-tax-insert").val(' ')
                $(".nilai-pr").val(nilai_pr)
            }
        })
        $('body').on('keyup', '.nilai-tax-value', function() {
            var persen = (parseInt($(this).val()) / 100)
            var nilai_pr = $(".nilai-pr").val()
            var new_nilai_pr = nilai_pr.replace(/\./g, '')
            var hasil_kalkulasi = parseInt(new_nilai_pr) * persen;
            var hasilFix = parseInt(new_nilai_pr) - parseInt(hasil_kalkulasi);
            const format = hasilFix.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            const rupiah = convert.join('.').split('').reverse().join('')
            $('.nilai-pr').val(rupiah)
        })
    })
</script>
@endpush