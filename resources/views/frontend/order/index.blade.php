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
                        <h4 class="mb-2">My Order List</h4>
                        <hr>
                        <div class="table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Tracking No</th>
                                        <th>Username</th>
                                        <th>Payment Mode</th>
                                        <th>Order Date</th>
                                        <th>Message Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_number }}</td>
                                            <td>{{ $order->username }}</td>
                                            <td>{{ $order->payment_mode }}</td>
                                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $order->status_message }}</td>
                                            <td>
                                                <a href="{{ url('order/'.$order->id) }}" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Order In List</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                            <div class="float-end">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
