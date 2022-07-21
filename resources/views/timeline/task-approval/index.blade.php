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
            ajax: {
                url: "{{ route('data.timeline') }}",
                data: {
                    'timeline_type': 'approval'
                }
            },
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
    })
</script>
@endpush