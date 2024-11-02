@extends('layouts.app')
@section('title')
    View Order
@endsection

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                       <h5 class="text-sm"><i class="fa fa-shopping-cart"></i> Order Details
                        <a href="{{ url('/order') }}" class="btn btn-sm btn-outline-warning float-end">Back To Order</a>
                       </h5>
                       <hr>
                       <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-primary">Order Details</h5>
                                <h6>Order Id: <label class="text-danger">{{ $order->id }}</label></h6>
                                <h6>Tracking Number: <label class="text-danger">{{ $order->tracking_number }}</label></h6>
                                <h6>Order Date: <label class="text-danger">{{ $order->created_at->format('d-m-Y') }}</label></h6>
                                <h6>Payment Mode: <label class="text-danger">{{ $order->payment_mode }}</label></h6>
                                <h6 class="border p-2 text-success">
                                    Order Status : <span class="uppercase"><label class="text-danger">{{ $order->status_message }}</label></span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-primary">User Details</h5>
                                <h6>Username: <label class="text-danger">{{ $order->username }}</label></h6>
                                <h6>Email: <label class="text-danger">{{ $order->email }}</label></h6>
                                <h6>Phone: <label class="text-danger">{{ $order->phone }}</label></h6>
                                <h6>Pin Code: <label class="text-danger">{{ $order->pin_code }}</label></h6>
                                <h6>Address: <label class="text-danger">{{ $order->address }}</label></h6>

                            </div>
                       </div>
                       <h5 class="text-primary">Order Item</h5>
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
        </div>
    </div>
@endsection
