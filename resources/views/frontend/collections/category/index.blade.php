@extends('layouts.app')

@section('title')
    All Category
@endsection

@section('content')
    <div class="py-2 py-md-3 bg-light">
        <div class="container">
            <div class="row" style=" justify-content: center">
                <div class="col-md-12">
                    <h5 class="mb-4 text-primary">All Categories </h5>
                </div>
                @forelse ($categories as $category)
                    <div class="col-12 col-md-2">
                        <div class="category-card" style="border-radius: 0.5rem" >
                            <a href="{{ url('collections/'.$category->slug) }}">
                                    <img src="{{ Storage::url($category->image) }}" style="border-radius: 0.5rem" width="200px" height="180px"  class="w-100" alt="image">
                                <div class="category-card-body  ">
                                    <p  style="font-size: 15px" >{{ $category->name }} </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>Category Not Found !</h5>
                    </div>
                @endforelse

            </div>
            <div class="float-end ">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
