@extends('layouts.partials.admin')
@section('header')
    Edit New User
@endsection
@section('user')
    active
@endsection
@section('action')
    <a href="{{ route('users.index') }}" >Back Home</a> | Edit New User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ route('users.update',$user) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">User name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror"
                            placeholder="name" autofocus autocomplete="">
                            @error('name')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">User email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror"
                            placeholder="email" autofocus autocomplete="">
                            @error('email')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="{{ $user->password }}" class="form-control @error('password') is-invalid @enderror"
                            placeholder="password" autofocus autocomplete="">
                            @error('password')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label for="role">Status</label>
                            <select name="role" id="role" class="form-control @error('role') @enderror">
                                <option value="0" {{ old('role',$user->role) === 0 ? 'selected' : '' }} >User</option>
                                <option value="1" {{ old('role',$user->role) === 1 ? 'selected' : '' }} >Admin</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right"> Save New User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
