@extends('layouts.app')
@section('title')
    Thank You
@endsection

@section('content')
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-4">
                    <img src="{{ asset('admin/dist/img/Ecommerce-PNG-Pic.png') }}" style="box-shadow: none" width="200" height="200" alt="">
                </div>
            <div class="col-md-4">
                <img src="{{ asset('admin/dist/img/thankyou-text.png') }}" style="box-shadow: none" width="200" height="200" alt="">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('admin/dist/img/Ecommerce-Transparent.png') }}" style="box-shadow: none" width="200" height="200" alt="">
            </div>
            <h5>We Glade Online Shopping...</h5>
            </div>
        </div>
@endsection
