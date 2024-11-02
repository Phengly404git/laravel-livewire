@extends('layouts.app')
@section('title')
    new arrivals
@endsection

@section('content')
    <div class="py-4 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-primary mb-3">New  Product</h5>

                </div>
                    <div class="col-md-12">
                        <div class="row">
                            @forelse ($new_arrival_products as $product)
                                <div class="col-md-2" >
                                    <div class="product-card">
                                        <div class="product-card-img">
                                                <label class="stock bg-danger">arrival</label>
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" >
                                                <img src="{{ Storage::url($product->image) }}" width="200px" height="220px" style="border-radius: 0.5rem" alt="Laptop">
                                            </a>
                                        </div>
                                            <div class="product-card-body mb-2" >
                                                <p class="float-end "><label for="" class="text-primary">{{ $product->brand }}</label></p>
                                                <h5 class="product-name" style="font-size: 15px" >
                                                    {{ $product->name }}
                                                </h5>
                                            </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12 p-2">
                                    <h5 class="text-danger"> No Product Arrivals</h5>
                                </div>
                            @endforelse
                            <div class="text-center">
                                <a href="{{ url('collections') }}" class="btn btn-warning btn-sm">View More...</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
