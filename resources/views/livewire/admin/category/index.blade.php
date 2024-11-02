<div class="container-fluid">
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action Manager</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td> <span class="right badge badge-primary">{{ $category->name }}</span></td>
                            <td><span class="right badge badge-info">{{ $category->slug }}</span></td>
                            <td>
                                <img src="{{ Storage::url( $category->image) }}" alt="null"
                                style="border-radius: 5rem" width="35px" height="30px">
                            </td>
                            <td><span class="right badge badge-danger">{{ $category->title }}</span></td>
                            <td>
                                <span class="right badge badge-{{ $category->status ? 'danger' : 'success' }}">
                                    {{ $category->status ? 'disable' : 'active' }}
                                </span>
                            </td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <a href="{{ route('categories.show',$category) }}" class="btn btn-success btn-xs"><i class="fas fa-eye"></i> View</a>
                                    &nbsp;
                                <a href="{{ route('categories.edit',$category) }}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i> Update</a>
                                <a class="btn btn-xs">
                                    <form action="{{ route('categories.destroy',$category) }}" method="POST"
                                        onsubmit="return confirm('Are you sure, delete {{ $category->name }} ?')" >
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
            {{-- <hr > --}}
            <div class="float-right mr-5">{{ $categories->links() }}</div>
        </div>
    </div>
</div>
