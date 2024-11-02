@extends('layouts.partials.admin')
@section('title')
    Order
@endsection

@section('action')

@endsection
@section('order')
    active
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-outline-success"><label for="" class="text-success">{{ session('success') }}</label></div>
                @endif
              <div class="card">
                <div class="card-header">

                  <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="form-control" >
                                <option value="">Select All Status</option>
                                <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }} >In Progress</option>
                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }} >Completed</option>
                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }} >Pending</option>
                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }} >Cancelled</option>
                                <option value="out for delivery" {{ Request::get('status') == 'out for delivery' ? 'selected' : '' }} >Out For Delivery</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Search Filter</button>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Tracking No</th>
                        <th>Username</th>
                        <th>Payment Mode</th>
                        <th>Order Date</th>
                        <th>Status Message</th>
                        <th>Action Manager</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->tracking_number }}</td>
                                <td>{{ $order->username }}</td>
                                <td>{{ $order->payment_mode }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>{{ $order->status_message }}</td>
                                <td>
                                    <a href="{{ route('orders.show',$order) }}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Details</a>
                                    <a href="{{ route('orders.edit',$order) }}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i>Update</a>
                                    <a href="" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Reject</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <label for="" class="text-danger">No Orders Avaliable Today !</label>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                  </table>
                  <div  class="float-right mr-5 " >
                    {{ $orders->links() }}
                </div>
                </div>
              </div>
            </div>
          </div>
    </div>


@endsection
