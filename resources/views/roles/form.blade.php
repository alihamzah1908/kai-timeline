@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h5 class="mb-3 header-title mt-0">Create Roles</h4>
                    <p class="sub-header">
                        Please insert user with form available
                    </p>
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter role name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Permission</label> <br />
                            @foreach($permission as $val) 
                                <input type="checkbox" name="permission[]" value="{{ $val->id }}"> {{ $val->name }} <br />
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary btn-rounded btn-sm">Save</button>
                    </form>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div> <!-- container-fluid -->
@endsection