@extends('layouts.partials.admin')
@section('header')
    Brand List
@endsection
@section('brand')
    active
@endsection
@section('action')
    <a href="{{ route('brands.create') }}" class="btn btn-sm btn-primary">New Brand</a>
@endsection

@section('content')
    <div>
        <livewire:admin.brand.index />
    </div>
@endsection
