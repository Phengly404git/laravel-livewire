@extends('layouts.partials.admin')
@section('header')
    Update  Brand
@endsection
@section('action')
<a href="{{ route('brands.index') }}" class="">Go Back</a> |
Update Brand
@endsection
@section('brand')
    active
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-info card-outline">
        <div class="card-body">
            <form action="{{ route('brands.update',$brand) }}" method="POST" >
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Select Category</label>
                        <select name="category_id" class="form-control" >
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $brand->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') @enderror">
                            <option value="0" {{ old('status',$brand->status) === 0 ? 'selected' : '' }} >active</option>
                            <option value="1" {{ old('status',$brand->status) === 1 ? 'selected' : '' }} >disable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name"> Name</label>
                        <input type="text" name="name" value="{{ $brand->name }}" class="form-control @error('name') is-invalid @enderror"
                         placeholder="name" autofocus autocomplete="name">
                         @error('name')
                             <div class="invalid-feedback" role="alert">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="slug"> Slug</label>
                        <input type="text" name="slug" value="{{ $brand->slug }}" class="form-control @error('slug') is-invalid @enderror"
                         placeholder="slug" autofocus autocomplete="">
                         @error('slug')
                             <div class="invalid-feedback" role="alert">{{ $message }}</div>
                         @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-floppy-disk"></i> Update Brand</button>
            </form>
        </div>
    </div>
</div>
@endsection
