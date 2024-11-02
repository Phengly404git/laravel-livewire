@extends('layouts.partials.admin')
@section('title')
    View Order
@endsection
@section('header')
<a href="{{ route('orders.index') }}" >Back To Order</a>
@endsection
@section('order')
    active
@endsection
@section('action')
<a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-sm btn-info">View Invoice</a> |
<a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-sm btn-warning">Download</a> |
<a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" class="btn btn-sm btn-primary">Send Invoice Via Mail</a>


@endsection

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-body table-responsive p-3">
            @if (session('message'))
                <p class="text-success" role="alert">
                    {{ (session('message')) }}
                </p>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-danger">Order Details</h6>
                    <div class="row ">
                        <div class="col-md-3">Order Id:</div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->id }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Tracking Number:</div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->tracking_number }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Order Date:</div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->created_at->format('d-m-Y') }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Payment Mode:</div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->payment_mode }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Order Status :</div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->status_message }}</span> </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="text-danger">User Details</h6>
                    <div class="row">
                        <div class="col-md-3">Username:</div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->username }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Email:</div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->email }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Phone: </div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->phone }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Pin Code:</div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->pin_code }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Address:</div>
                        <div class="col-md-3"><span class="right badge badge-primary">  {{ $order->address }}</span></div>
                    </div>

                </div>
           </div>
            <br>
           <h6 class="text-danger">Order Item</h6>
           <div class="table-responsive p-0">
               <table class="table table-hover text-nowrap">
                   <thead>
                       <tr>
                           <th>Item Id</th>
                           <th>Image</th>
                           <th>Product</th>
                           <th>Price</th>
                           <th>Quantity</th>
                           <th>Total</th>
                       </tr>
                   </thead>
                   <tbody>
                       @php
                           $total_amount = 0;
                       @endphp
                       @foreach ($order->orderItems as $orderItem)
                           <tr>
                               <td>{{ $orderItem->id }}</td>
                               <td>
                                   @if ($orderItem->product->image)
                                   <img src="{{ Storage::url($orderItem->product->image) }}" style="width: 50px; height: 50px; border-radius: 0.5rem" alt="">
                                   @else
                                   <img src="https://placeholder.pics/svg/100x100/DEDEDE/555555/no%20image" style="width: 50px; height: 50px; border-radius: 0.5rem" alt="">
                                   @endif
                               </td>
                               <td>{{ $orderItem->product->name }}</td>
                               <td>$ {{ $orderItem->price }}</td>
                               <td>{{ $orderItem->quantity }}</td>
                               <td>$ {{ $orderItem->quantity * $orderItem->price }}</td>
                               @php
                                   $total_amount += $orderItem->quantity * $orderItem->price
                               @endphp
                           </tr>
                       @endforeach
                       <tr>
                           <td colspan="5">
                               Total Amount
                           </td>
                           <td>$ {{ $total_amount }}</td>
                       </tr>
                   </tbody>
               </table>
           </div>



        </div>
    </div>
</div>
@endsection
