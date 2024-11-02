@extends('layouts.partials.admin')
@section('title')
    setting
@endsection

@section('setting')
    active
@endsection

@section('header')
    Create Site Setting
@endsection
@section('action')
    <a href="{{ route('settings.index') }}" >Back Site Setting</a>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card table-responsive p-0">
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                    </div>
                    <button type="button" class="btn btn-success float-right">Save Site Setting</button>
                </form>
            </div>
        </div>
    </div>
@endsection
