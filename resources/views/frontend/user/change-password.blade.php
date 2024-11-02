@extends('layouts.app')
@section('title')
    change password
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if (session('message'))
                    <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                @endif

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('change-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Current Password</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror " />
                                @error('current_password')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control" @error('password') is-invalid @enderror />
                                @error('password')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror " />
                                @error('password_confirmation')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mb-3 text-end">
                                <hr>
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
