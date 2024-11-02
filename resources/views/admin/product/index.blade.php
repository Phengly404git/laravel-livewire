@extends('layouts.partials.admin')

@section('product')
    active
@endsection

@section('header')
    Products List
@endsection

@section('action')
    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">New Product</a>
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
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td> <span class="right badge badge-primary"> {{ $product->name }}</span></td>
                                <td>
                                    <img src="{{ Storage::url($product->image) }}" style="border-radius: 4rem" alt="image" width="35px" height="30px">
                                </td>
                                <td><span class="right badge badge-warning">{{ $product->color }}</span></td>
                                <td><span class="right badge badge-info">{{ $product->brand }}</span></td>
                                <td><span class="right badge badge-info" >{{ $product->category->name }}</span></td>

                                <td>
                                    <span class="right badge badge-{{$product->quantity ? 'success' : 'warning'}}">
                                    {{$product->quantity ? $product->quantity.' In Stock' : 'Out Of Stock'}}
                                    </span>
                                </td>

                                <td><span class="right badge badge-primary">$  {{ $product->cost_of_good }}</span></td>
                                <td><span class="right badge badge-primary"> $ {{ $product->price }}</span></td>
                                <td>
                                    <span class="right badge badge-{{ $product->status ? 'danger' : 'success' }}">
                                        {{ $product->status ? 'disable' : 'active' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="right badge badge-{{ $product->trending ? 'danger' : 'success' }}">
                                        {{ $product->trending ? 'no trending' : 'trending' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('products.show',$product) }}" class="btn btn-success btn-xs"><i class="fas fa-eye"></i> View</a>
                                        &nbsp;
                                    <a href="{{ route('products.edit',$product) }}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Update</a>
                                    <a class="btn btn-xs">
                                        <form action="{{ route('products.destroy',$product) }}" method="POST"
                                            onsubmit="return confirm('Are you sure, delete {{ $product->name }} ?')" >
                                            @method('DELETE')
                                            @csrf
                                           <button type="submit" class="btn btn-danger btn-xs" ><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
