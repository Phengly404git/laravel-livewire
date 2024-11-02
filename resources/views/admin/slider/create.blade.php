@extends('layouts.partials.admin')
@section('header')
    Create Slider
@endsection
@section('slider')
    active
@endsection
@section('action')
    <a href="{{ route('sliders.index') }}" >Back Home</a> | Create New Slider
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="title"> Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            placeholder="title" autofocus autocomplete="">
                            @error('title')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') @enderror">
                                <option value="0" {{ old('status') === 0 ? 'selected' : '' }} >active</option>
                                <option value="1" {{ old('status') === 1 ? 'selected' : '' }} >disable</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="image" autofocus autocomplete="">
                            @error('image')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12 ">
                            <label for="description"> Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror "
                            name="description" id="description" cols="10" rows="2" placeholder="description"></textarea>
                            @error('description')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-floppy-disk"></i> Save New Slider</button>
                </form>
            </div>
        </div>
    </div>
@endsection
