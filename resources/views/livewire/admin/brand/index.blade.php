
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card table-responsive p-0">
                <div class="card-body">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>category</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td><span class="right badge badge-primary">{{ $brand->name }}</span></td>
                                    <td><span class="right badge badge-primary">{{ $brand->slug }}</span></td>
                                    <td>
                                        @if ($brand->category)
                                        <span class="right badge badge-info">{{ $brand->category->name }}</span>
                                        @else
                                            <span class="right badge badge-danger">No Category</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="right badge badge-{{ $brand->status ? 'danger' : 'success' }}">
                                            {{ $brand->status ? 'disable' : 'active' }}
                                        </span>
                                    </td>
                                    <td>{{ $brand->created_at }}</td>
                                    <td>

                                        <a href="{{ route('brands.edit',$brand) }}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Update</a>
                                        <a class="btn btn-xs">
                                            <form action="{{ route('brands.destroy',$brand) }}" method="POST"
                                                onsubmit="return confirm('Are you sure, delete {{ $brand->name }} ?')" >
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
    </div>
</div>

