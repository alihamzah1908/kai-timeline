@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h4 class="header-title mt-0 mb-1">List Roles</h4>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('roles.create') }}">
                                <button type="button" class="d-flex justify-content-end btn btn-success btn-sm btn-rounded"><i class="uil-plus-circle"></i> &nbsp; Add Roles</button>
                            </a>
                        </div>
                    </div>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Roles Name</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @foreach($roles as $key => $val)
                            <tr>
                                <td>{{ ucfirst($val->name) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true" type="button">Action
                                            <i class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg></i>
                                            <div></div>
                                        </button>
                                        <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" role="presentation" href="javascript:void(0)"> <i class="uil uil-edit-alt"></i> Edit</a>
                                            <a class="dropdown-item" role="presentation" href="javascript:void(0)"> <i class="uil uil-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
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