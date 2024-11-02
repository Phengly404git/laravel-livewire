@extends('layouts.partials.admin')

@section('product')
    active
@endsection

@section('header')
    Update Product
@endsection

@section('action')
    <a href="{{ route('products.index') }}">Back Home</a> | Edit Product Field
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-outline card-info table-responsive p-0 ">
        <div class="card-body">
            <form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Categoy</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' :'' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror " placeholder="name">
                        @error('name')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Slug</label>
                            <input type="text" name="slug" value="{{ $product->slug }}" class="form-control @error('slug') is-invalid @enderror " placeholder="slug">
                        @error('slug')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Brand</label>
                        <select name="brand" id="brand" class="form-control">
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->name}}" {{ $brand->name == $product->brand ? 'selected' : '' }} >{{  $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Status</label>
                        <select name="status" class="form-control">
                            <option value="0" {{ old('status',$product->status) === 0 ? 'selected' : '' }} >active</option>
                            <option value="1" {{ old('status',$product->status) === 1 ? 'selected' : '' }} >disable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Trending</label>
                        <select name="trending" class="form-control">
                                <option value="0" {{ old('trending',$product->trending) === 0 ? 'selected' : '' }} >trending</option>
                                <option value="1" {{ old('trending',$product->trending) === 1 ? 'selected' : '' }} >no trending</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control @error('quantity') is-invalid @enderror " placeholder="quantity" >
                        @error('quantity')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Cost Of Goods</label>
                        <input type="text" name="cost_of_good" value="{{ $product->cost_of_good }}" class="form-control @error('cost_of_good') is-invalid @enderror " placeholder="cost of good" >
                        @error('cost_of_good')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Price</label>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control @error('price') is-invalid @enderror " placeholder="price" >
                        @error('price')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Select Color</label>
                        <select name="color" class="form-control" >
                            @foreach ($colors as $color)
                                <option value="{{ $color->name }}" {{ $color->name == $product->color ? 'selected' : '' }}  >{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{ $product->title }}" class="form-control @error('title') is-invalid @enderror" placeholder="title" >
                        @error('title')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Keyword</label>
                        <input type="text" name="keyword" value="{{ $product->keyword }}" class="form-control @error('keyword') is-invalid @enderror" placeholder="keyword" >
                        @error('keyword')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Short Description</label>
                        <textarea name="short_description" class="form-control" placeholder="short description" cols="20" rows="1">
                            {{ $product->short_description }}
                        </textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" >
                        <div >{{ $product->image }}</div>
                        @error('image')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for=""> Description</label>
                        <textarea name="description"  class="form-control" placeholder=" description" cols="20" rows="2">
                            {{ $product->description }}
                        </textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">Update Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
