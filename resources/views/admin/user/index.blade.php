@extends('layouts.partials.admin')
@section('header')
    User List
@endsection

@section('user')
    active
@endsection

@section('action')
    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm" >New User</a>
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="card table-resposive p-0">
            <div class="card-body">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="right badge badge-{{ $user->role ? 'success' : 'primary' }}">
                                        {{ $user->role ? 'admin' : 'user' }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('users.edit',$user)}}  "class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Update</a>
                                    <a class="btn btn-xs">
                                        <form action="{{ route('users.destroy',$user) }}" method="POST"
                                            onsubmit="return confirm('Are you sure, delete {{ $user->name }} ?')" >
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
                <div class="float-right">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
@endsection
