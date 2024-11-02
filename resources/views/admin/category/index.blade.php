@extends('layouts.partials.admin')
@section('category')
    active
@endsection

@section('header')
    Category List
@endsection
@section('action')
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm ">New Category</a>
@endsection
@section('content')
    <div>
        <livewire:admin.category.index />
    </div>
@endsection
