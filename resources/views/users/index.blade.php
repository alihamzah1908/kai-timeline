@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h4 class="header-title mt-0 mb-1">List Users</h4>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('users.create') }}">
                                <button type="button" class="d-flex justify-content-end btn btn-success btn-sm btn-rounded"><i class="uil-plus-circle"></i> &nbsp; Add Users</button>
                            </a>
                        </div>
                    </div>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Roles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div> <!-- container-fluid -->
@endsection