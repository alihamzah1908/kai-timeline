@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h4 class="header-title mt-0 mb-1">Task Approval SP 3</h4>
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