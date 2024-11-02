@extends('layouts.partials.admin')
@section('order')
    active
@endsection

@section('header')
    Order Status : <span class="right badge badge-primary">{{ $order->status_message }}</span>
@endsection

@section('action')
    <a href="{{ route('orders.index') }}" >Back To Order</a> | Update Order Status
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card table-responsive p-0">
            <div class="card-body">
                <form action="{{ route('orders.update',$order) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group ">
                            <label for="">Select order Status</label>
                            <select name="status_message" class="form-control">
                                <option value="">Select order Status</option>
                                <option value="in progress" {{ Request::get('status') == 'in Progress' ? 'selected' : '' }} >In Progress</option>
                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }} >Completed</option>
                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }} >Pending</option>
                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }} >Cancelled</option>
                                <option value="out for delivery" {{ Request::get('status') == 'out for delivery' ? 'selected' : '' }} >Out For Delivery</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success float-right">Update Order Status</button>
                </form>
            </div>
        </div>
    </div>
@endsection
