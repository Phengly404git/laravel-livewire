@extends('layouts.app')

@section('title')
    {{ $product->title }}
@endsection
@section('keyword')
    {{ $product->keyword }}
@endsection


@section('content')
    <div>
        <livewire:frontend.product.details :category="$category" :product="$product" />
    </div>
@endsection
