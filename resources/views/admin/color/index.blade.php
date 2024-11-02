@extends('layouts.partials.admin')
@section('color')
    active
@endsection

@section('header')
    Color Theme
@endsection

@section('action')
    <a href="{{ route('colors.create') }}" class="btn btn-sm btn-primary">New Color</a>
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
                            <th>Code</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $color)
                            <tr>
                                <td>{{ $color->id }}</td>
                                <td><span class="right badge badge-primary">{{ $color->name }}</span></td>
                                <td><span class="right badge badge-info">{{ $color->code }}</span></td>
                                <td><span class="right badge badge-{{ $color->status ? 'danger' :  'success' }}">
                                    {{ $color->status ? 'disable' : 'active' }}
                                </span></td>
                                <td>{{ $color->created_at }}</td>
                                <td>

                                    <a href="{{ route('colors.edit',$color) }}" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Update</a>
                                    <a class="btn btn-xs">
                                        <form action="{{ route('colors.destroy',$color) }}" method="POST"
                                            onsubmit="return confirm('Are you sure, delete {{ $color->name }} ?')" >
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
