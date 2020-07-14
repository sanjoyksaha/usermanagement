@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Edit User <span class="text-danger">{{ $user->name }}</span></div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="" class="col-md-2">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus value="{{ $user->name }}">
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
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autofocus value="{{ $user->email }}">
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
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 col-form-label text-md-right">Roles</label>
                            <div class="col-md-6">
                                @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif class="@error('roles') is-invalid @enderror">
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
                        
                        <input type="submit" class="btn btn-primary btn-sm" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection