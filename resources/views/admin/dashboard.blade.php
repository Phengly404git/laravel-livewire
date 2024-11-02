@extends('layouts.partials.index')

@section('header')
    @if (session('message'))
        {{ session('message') }}
    @endif
    Welcome
@endsection
@section('dashboard')
    active
@endsection
@section('action')
    View Dashboard List
@endsection
