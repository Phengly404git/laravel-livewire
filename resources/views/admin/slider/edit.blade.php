@extends('layouts.partials.admin')
@section('header')
    Update Slider
@endsection
@section('slider')
    active
@endsection
@section('action')
    <a href="{{ route('sliders.index') }}" >Back Home</a> | Update Slider
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ route('sliders.update',$slider) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="title"> Title</label>
                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control @error('title') is-invalid @enderror"
                            placeholder="title" autofocus autocomplete="">
                            @error('title')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') @enderror">
                                <option value="0" {{ old('status',$slider->status) === 0 ? 'selected' : '' }} >active</option>
                                <option value="1" {{ old('status',$slider->status) === 1 ? 'selected' : '' }} >disable</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="image" autofocus autocomplete="">
                                <td>{{ $slider->image }}</td>
                            @error('image')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12 ">
                            <label for="description"> Description</label>
                        <textarea class="form-control" name="description" id="description" cols="10" rows="2" placeholder="description">
                            {{ $slider->description }}
                        </textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-floppy-disk"></i> Update Slider</button>
                </form>
            </div>
        </div>
    </div>
@endsection
