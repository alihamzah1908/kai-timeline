@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3 header-title mt-0">Create User</h4>
                        <p class="sub-header">
                            Please insert roles with form available
                        </p>
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fullname</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter fullname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Role</label> <br />
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded btn-sm">Save</button>
                        </form>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div> <!-- container-fluid -->
@endsection