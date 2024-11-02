@extends('layouts.app')
@section('title')
    {{ $category->title }}
@endsection

@section('keyword')
    {{ $category->keyword }}
@endsection

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4"> Products : <label for="" class="text-primary">{{ $category->name }}</label></h4>
                </div>
                <livewire:frontend.product.index :category="$category" />
            </div>
        </div>
    </div>
@endsection
