<div class="py-3 py-md-5 bg-light">
    @if (session()->has('success'))
        <div class="alert alert-primary">
            {{ session('message') }}
        </div>
        @endif
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="bg-white ">
                    <img src="{{ Storage::url($product->image) }}" style="border-radius: 0.5rem" width="300px" height="450px" class="w-100" alt="Img">
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $product->name }}
                        @if ($product->quantity > 0)
                        <label class="label-stock bg-success">In Stock</label>
                            @else
                        <label class="label-stock bg-danger">Out Of Stock</label>
                        @endif

                    </h4>
                    <hr>
                    <p>Date Posted : {{ \Carbon\Carbon::parse($product->created_at)->format('d-M-Y') }}</p>
                    <p class="product-path">
                        Home / {{ $product->category->name }} / {{ $product->name }}
                    </p>

                    <div>
                        <span class="selling-price">$ {{ $product->cost_of_good }}</span>
                        <span class="original-price">$ {{ $product->price }}</span>
                    </div>
                   <div>
                        Color : {{ $product->color }}
                   </div>
                    <div class="mt-2">
                        <div class="input-group">
                            <span class="btn btn1" wire:click="decrementQty" ><i class="fa fa-minus"></i></span>
                            <input type="text" wire:model="qtyCount" value="{{ $this->qtyCount }}" readonly class="input-quantity" />
                            <span class="btn btn1" wire:click="incrementQty"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                    <div class="mt-2">

                        <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1">
                            <span wire:loading.remove wire:target='addToWishlist' >
                                <i class="fa fa-heart"></i> Add To Wishlist
                            </span>
                            <span wire:loading wire:target='addToWishlist' >Adding...</span>

                        </button>
                        <button type="button"  class="btn btn1" wire:click="addToCart({{ $product->id }})" > <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {{ $product->short_description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 17px">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
