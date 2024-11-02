@extends('layouts.app')
@section('title')
    User Profile
@endsection

@section('content')
    <div class="py-4 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h5 class="text-primary mb-3">User Profile
                        <a href="{{ url('change-password') }}" class="btn btn-warning  float-end mb-3">Change Password.</a>
                    </h5>
                </div>
                <div class="col-md-10">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card-shadow">
                        <div class="card-header bg-info mb-3">
                            <h5 class="mb-0 text-white">User Details</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('profiles') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Username</label>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                           <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Email Address</label>
                                        <input type="text" name="email" readonly value="{{ Auth::user()->email }}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ??  '' }}"
                                        class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                     @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Pin Code</label>
                                        <input type="text" name="pin_code" value="{{ Auth::user()->userDetail->pin_code ??  '' }}"
                                        class="form-control @error('pin_code') is-invalid @enderror ">
                                        @error('pin_code')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Address</label>
                                        <textarea name="address" rows="2" class="form-control @error('address') is-invalid @enderror ">
                                            {{ Auth::user()->userDetail->address ??  '' }}
                                        </textarea>
                                       @error('address')
                                       <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                       @enderror
                                    </div>
                                </div>
                                <div class="float-end mt-3">
                                    <button type="submit" class="btn btn-primary">Update User Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
