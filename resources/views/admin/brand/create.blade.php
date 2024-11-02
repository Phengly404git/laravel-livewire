@extends('layouts.partials.admin')
@section('header')
    Create New Brand
@endsection
@section('action')
    <a href="{{ route('brands.index') }}" >Go back</a> |  Create New Brand
@endsection
@section('brand')
    active
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-info card-outline">
        <div class="card-body">
            <form action="{{ route('brands.store') }}" method="POST" >
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Select Category</label>
                        <select name="category_id" class="form-control" >
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') @enderror">
                            <option value="0" {{ old('status') === 0 ? 'selected' : '' }} >active</option>
                            <option value="1" {{ old('status') === 1 ? 'selected' : '' }} >disable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name"> Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                         placeholder="name" autofocus autocomplete="name">
                         @error('name')
                             <div class="invalid-feedback" role="alert">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="slug"> Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                         placeholder="slug" autofocus autocomplete="">
                         @error('slug')
                             <div class="invalid-feedback" role="alert">{{ $message }}</div>
                         @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-floppy-disk"></i> Save New Brand</button>
            </form>
        </div>
    </div>
</div>
@endsection
