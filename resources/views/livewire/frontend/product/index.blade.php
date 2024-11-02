<div>
    <div class="row">
        <div class="col-md-2">

            <div class="card">
                <div class="card-header">
                    <h5 class="text-primary">Filter By Brands</h5>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brand)
                    <label class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{ $brand->name }}" /> {{ $brand->name }}
                    </label>
                    @endforeach

                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="text-primary">Filters By Price</h5>
                </div>
                <div class="card-body">

                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low" /> high to low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high" />   low to high
                    </label>


                </div>
            </div>

        </div>

        <div class="col-md-10">
            <div class="row">
                @forelse ($products as $product)
                <div class="col-md-3" >
                    <div class="product-card">
                        <div class="product-card-img">
                                @if ($product->quantity > 0)
                                <label class="stock bg-info">In Stock</label>
                                @else
                                <label class="stock bg-danger">Out Stock</label>
                                @endif

                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" >
                                <img src="{{ Storage::url($product->image) }}" width="200px" height="220px" style="border-radius: 0.5rem" alt="Laptop">
                            </a>
                        </div>
                            <div class="product-card-body mb-2" >
                                <p class="float-end "><label for="" class="text-primary">{{ $product->brand }}</label></p>
                                <h5 class="product-name" style="font-size: 15px" >
                                    {{ $product->name }}
                                </h5>
                                <div class="text-between">
                                    <span class="selling-price">$ {{ $product->cost_of_good }}</span>
                                    <span class="original-price ">$ {{ $product->price }}</span>
                                </div>
                                <div style="text-align: center" >
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" class="btn btn3 btn-sm btn-outline-info">
                                         View Detail
                                    </a>
                                    <a class="btn btn2 btn-sm btn-outline-info "> <i class="fa fa-heart"></i> </a>
                                    <a href="" class="btn btn1 btn-sm">Add To Cart</a>
                                </div>
                            </div>
                    </div>
                </div>
               @empty
                   <div class="col-md-12">
                    <div class="p-2">
                        <h5 class="text-danger"> {{ $category->name }} no avaliable</h5>
                    </div>
                   </div>
               @endforelse
            </div>
        </div>

    </div>

</div>
