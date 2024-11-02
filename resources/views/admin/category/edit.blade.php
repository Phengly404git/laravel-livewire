@extends('layouts.partials.admin')

@section('category')
    active
@endsection

@section('header')
     <label for="" class="label  label-primary">Update Category Item</label>
@endsection
@section('action')
<a href="{{ route('categories.index') }}" class="">Go Back</a> |
    Create Category
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ route('categories.update',$category) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name"> Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                             placeholder="name" autofocus autocomplete="name" value="{{ $category->name }}" >
                             @error('name')
                                 <div class="invalid-feedback" role="alert">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="slug"> Slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                             placeholder="slug" autofocus autocomplete="" value="{{ $category->slug }}" >
                             @error('slug')
                                 <div class="invalid-feedback" role="alert">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                             placeholder="title" autofocus autocomplete="title" value="{{ $category->title }}" >
                             @error('title')
                                 <div class="invalid-feedback" role="alert">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="keyword">Keyword</label>
                            <input type="text" name="keyword" class="form-control @error('keyword') is-invalid @enderror"
                             placeholder="keyword" autofocus autocomplete="" value="{{ $category->keyword }}" >
                             @error('keyword')
                                 <div class="invalid-feedback" role="alert">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') @enderror">
                                <option value="0" {{ old('status',$category->status) === 0 ? 'selected' : '' }} >active</option>
                                <option value="1" {{ old('status',$category->status) === 1 ? 'selected' : '' }} >disable</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                            placeholder="image" autofocus autocomplete="">
                            <td>{{ $category->image }}</td>
                            @error('image')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="short_description">Short Description</label>
                          <textarea class="form-control" name="short_description" id="short_description" cols="10" rows="1" placeholder="short_description">
                            {{ $category->short_description }}
                          </textarea>
                        </div>
                        <div class="form-group col-md-12 ">
                            <label for="description"> Description</label>
                          <textarea class="form-control" name="description" id="description" cols="10" rows="3" placeholder="description">
                            {{ $category->description }}
                          </textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-floppy-disk"></i> Update New Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
