@extends('layouts.partials.admin')
@section('title')
    setting
@endsection

@section('setting')
    active
@endsection

@section('action')
    <a href="{{ route('settings.create') }}" class="btn btn-primary">Create Setting</a>
@endsection



@section('content')
<div class="container-fluid">
    <div class="card table-responsive p-0">
        <div class="card-body">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Color</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>COG</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Trending</th>
                        <th>Action</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
@endsection
