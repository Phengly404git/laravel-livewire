@extends('layouts.partials.admin')
@section('header')
    Create New Color
@endsection
@section('action')
    <a href="{{ route('colors.index') }}" >Go back</a> |  Create New Color
@endsection
@section('color')
    active
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-info card-outline">
        <div class="card-body">
            <form action="{{ route('colors.store') }}" method="POST" >
                @csrf
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') @enderror">
                            <option value="0" {{ old('status') === 0 ? 'selected' : '' }} >active</option>
                            <option value="1" {{ old('status') === 1 ? 'selected' : '' }} >disable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="name"> Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                         placeholder="name" autofocus autocomplete="name">
                         @error('name')
                             <div class="invalid-feedback" role="alert">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="code"> Code</label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                         placeholder="code" autofocus autocomplete="">
                         @error('code')
                             <div class="invalid-feedback" role="alert">{{ $message }}</div>
                         @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-floppy-disk"></i> Save New Color</button>
            </form>
        </div>
    </div>
</div>
@endsection
