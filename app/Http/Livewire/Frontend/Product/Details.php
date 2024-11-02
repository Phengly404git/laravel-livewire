<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Details extends Component
{
    public $category;
    public $product;
    public $qtyCount = 1;

    public function mount($category,$product){
        $this->category = $category;
        $this->product = $product;
    }


    public function decrementQty(){
        if($this->qtyCount > 1){
            $this->qtyCount = $this->qtyCount - 1;
        }
    }

    public function incrementQty(){
        if($this->qtyCount < 10){
            $this->qtyCount = $this->qtyCount + 1;
        }
    }

    public function addToWishlist($productId){
        if(Auth::check()){
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Already added to wishlist  !',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else{
                    Wishlist::create([
                    'user_id' =>auth()->user()->id,
                    'product_id' =>$productId,
                ]);
                $this->emit('refreshPage');
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Add to wishlist successfully !',
                    'type' => 'success',
                    'status' => 200
                ]);
                return redirect()->back();
            }

        }
        $this->dispatchBrowserEvent('message',[
            'text' => 'Login to continue...',
            'type' => 'success',
            'status' => 401
        ]);
        return redirect()->back();
    }

    public function addToCart($productId){
        // check login
        if(Auth::check()){
            // check product exitst
            if($this->product->where('id',$productId)->where('status','0')->exists()){

                if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Already add to cart !' ,
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
                else{
                       // check quantity product exist
               if($this->product->quantity > 0){
                // check product quantity avaliable add-to-cart or not
                if($this->product->quantity >= $this->qtyCount){
                    // add-to-cart
                    Cart::create([
                        'user_id' =>auth()->user()->id,
                        'product_id' => $productId,
                        'quantity' =>$this->qtyCount
                    ]);
                    $this->emit('refreshPage');
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Added to cart successfully !' ,
                        'type' => 'success',
                        'status' => 200
                    ]);

                }
                else{
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'only'.$this->product->quantity.'quantity avaliable.' ,
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }


               }
               else{
                    // product out of stock
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Product out of stock.',
                        'type' => 'warning',
                        'status' => 404
                    ]);
               }
                }


            }
            else{
                 // no product exist
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Product does not exists.',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }

        }
        else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Login to continue...',
                'type' => 'success',
                'status' => 401
            ]);
        }

        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.frontend.product.details',[
            'category' =>$this->category,
            'product' =>$this->product
        ]);
    }
}
