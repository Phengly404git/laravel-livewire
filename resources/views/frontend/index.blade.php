@extends('layouts.app')
@section('title')
    Home Page
@endsection


@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-inner">

        @foreach ($sliders as $active => $slider)
            <div class="carousel-item {{ $active == '0' ? 'active' :'' }}">
                @if ($slider->image)
                    <img src="{{ Storage::url($slider->image) }}" class="d-block w-100" alt="...">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {{ $slider->title }}
                        </h1>
                        <p>
                           {{ $slider->description }}
                        </p>
                        <div>
                            <a href="#" class="btn btn-slider" style="border-radius:0.5rem" >
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h5>Welcome To Ecommerce</h5>
                <div class="underline"></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima perspiciatis tempore possimus
                    fugit cupiditate quaerat sint inventore consectetur obcaecati dignissimos odit laborum doloribus
                    quae tempora alias autem, esse repellendus aut.
                </p>
            </div>

        </div>
    </div>
</div>

<div class="py-4 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-primary mb-2">Trending Product</h4>
            </div>
            @if($trending_products)
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($trending_products as $product)
                        <div class="col-md-2" >
                            <div class="product-card">
                                <div class="product-card-img">
                                        <label class="stock bg-danger">trending</label>
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
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="py-4 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-primary mb-2">New Arrivals Product</h4>
            </div>
            @if($new_arrival_products)
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($new_arrival_products as $product)
                        <div class="col-md-2" >
                            <div class="product-card">
                                <div class="product-card-img">
                                        <label class="stock bg-danger">arrivals</label>
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
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection


{{-- @section('script')
    <script type="text/javascript">
    $(document).ready(function() {
        $('.trending-product').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            })
    });

    </script>
@endsection --}}
