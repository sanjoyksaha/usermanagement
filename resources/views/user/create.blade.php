@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Create User</div>

                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-md-2">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Name is required</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2">Email</label>
                            <div class="col-md-10">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2">Password</label>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Password is required</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 col-form-label">Role</label>
                            <div class="col-md-6" >
                                @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="@error('roles') is-invalid @enderror">
                                    <label for="">{{ $role->name }}</label>
                                </div>
                                @endforeach
                                @error('roles')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>Please assign role</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-10 offset-md-2">
                            <input type="submit" class="btn btn-primary btn-sm" value="Create">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection