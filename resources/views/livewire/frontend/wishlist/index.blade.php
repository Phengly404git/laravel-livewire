<div class="py-3 py-md-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">

                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            {{-- <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div> --}}
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>

                    @forelse ($wishlists as $wishlist)
                        @if ($wishlist->product)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{ url('collections/'.$wishlist->product->category->slug.'/'.$wishlist->product->slug) }}">
                                            <label class="product-name">
                                                <img src="{{ Storage::url($wishlist->product->image) }}"
                                                style="width: 50px; height: 50px; border-radius: 0.3rem " alt="">
                                                {{ $wishlist->product->name }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">$ {{ $wishlist->product->cost_of_good }} </label>
                                    </div>

                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:click="removeWishlist({{ $wishlist->id }})" class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeWishlist({{ $wishlist->id }})" >
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                                <span wire:loading wire:target="removeWishlist({{ $wishlist->id }})" ><i class="fa fa-trash"></i> Removing...</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @empty
                       <h5 class="text-danger">No Wishlist Add</h5>
                    @endforelse

                </div>
            </div>
        </div>

    </div>
</div>
