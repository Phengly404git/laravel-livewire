<div class="py-3 py-md-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">

                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row" style="justify-content: center; align-items: center " >
                            <div class="col-md-6">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-1">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-1">
                                <h4>Sub Total</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>
                    @forelse ($carts as $cart)
                        @if ($cart->product)
                            <div class="cart-item">
                                <div class="row" style="justify-content: center; align-items: center" >
                                    <div class="col-md-6 my-auto">
                                        <a href="{{ url('collections/'.$cart->product->category->slug.'/'.$cart->product->slug) }}">
                                            <label class="product-name">
                                                @if ($cart->product->image)
                                                <img src="{{ Storage::url($cart->product->image) }}" style="width: 50px; height: 50px; border-radius: 0.5rem" alt="">
                                                @else
                                                <img src="https://placeholder.pics/svg/100x100/DEDEDE/555555/no%20image" style="width: 50px; height: 50px; border-radius: 0.5rem" alt="">
                                                @endif
                                                &nbsp;
                                                {{ $cart->product->name }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">$ {{ $cart->product->cost_of_good }} </label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <button type="button" wire:loading.attr="disable" wire:click="decrementCartQty({{ $cart->id }})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="{{ $cart->quantity }}" readonly class="input-quantity" />
                                                <button type="button" wire:loading.attr="disable" wire:click="incrementCartQty(({{ $cart->id }}))" class="btn btn1"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label for="" class="price">$ {{ $cart->product->cost_of_good * $cart->quantity }}</label>
                                        @php
                                             $total_price += $cart->product->cost_of_good * $cart->quantity
                                        @endphp
                                    </div>

                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:loading.attr="disable" wire:click="removeCart({{ $cart->id }})"
                                                class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeCart({{ $cart->id }})"  >
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                                <span wire:loading wire:target="removeCart({{ $cart->id }})"  >
                                                    <i class="fa fa-trash"></i> Loading...
                                                </span>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <h5 class="text-danger">No cart Add</h5>
                    @endforelse


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 my-md-auto mt-3">
                <h5>
                   Get the best Deal & Offer <a href="{{ url('collections') }}" class="btn btn-info btn-md">Shop Now</a>
                </h5>
            </div>
            <div class="col-md-4 mt-3">
                <div class="shadow-sm bg-white p-3">
                    <h5>Total: <span class="float-end">$ {{ $total_price }}</span></h5>
                    <hr>
                    <a href="{{ url('checkout') }}" style="font-size: 17px; color: black" class="btn btn-warning w-100 ">Checkout</a>
                </div>
            </div>
        </div>

    </div>
</div>
