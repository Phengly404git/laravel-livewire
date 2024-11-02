@extends('layouts.partials.admin')
@section('header')
    Slider List
@endsection

@section('slider')
    active
@endsection
@section('action')
    <a href="{{ route('sliders.create') }}" class="btn btn-sm btn-primary">New Slider</a>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>
                                <img src="{{ Storage::url( $slider->image) }}" alt="null"
                                style="border-radius: 5rem" width="35px" height="30px">
                            </td>
                            <td><span class="right badge badge-primary">{{ $slider->title }}</span></td>
                            <td>
                                <span class="right badge badge-{{ $slider->status ? 'danger': 'success'  }}">
                                    {{ $slider->status ? 'disable' : 'active' }}
                                </span>
                            </td>
                            <td>{{ $slider->created_at }}</td>
                            <td>{{ $slider->updated_at }}</td>
                            <td>
                                <a href="{{ route('sliders.edit',$slider) }}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Update</a>
                                <a class="btn btn-xs">
                                    <form action="{{ route('sliders.destroy',$slider) }}" method="POST"
                                        onsubmit="return confirm('Are you sure, delete {{ $slider->title }} ?')" >
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
            <hr >
            <div class="float-right mr-5">{{ $sliders->links() }}</div>
        </div>
    </div>
</div>
@endsection
