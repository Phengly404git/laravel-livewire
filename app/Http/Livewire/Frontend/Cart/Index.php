<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class Index extends Component
{
    public $carts;
    public $total_price = 0;

    public function decrementCartQty(int $cartId){
       $cartQty = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
       if($cartQty){
        if($cartQty->quantity >= 1){
            $cartQty->decrement('quantity');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Quantity Updated !',
                'type' =>'success',
                'status' => 200
            ]);
        }
        else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Quantity Could be One In Cart',
                'type' =>'error',
                'status' => 404
            ]);
        }
    }
    }

    public function incrementCartQty(int $cartId){
        $cartQty = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartQty){
            if($cartQty->product->quantity > $cartQty->quantity){
                $cartQty->increment('quantity');
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Quantity Updated !',
                    'type' =>'success',
                    'status' => 200
                ]);
            }
            else{
                $this->dispatchBrowserEvent('message',[
                    'text' => 'Product Out Of Stock !',
                    'type' =>'error',
                    'status' => 404
                ]);
            }
        }
    }

    public function removeCart(int $cartId){

        $remove_cart = Cart::where('user_id',auth()->user()->id)->where('id',$cartId)->first();
        if($remove_cart){
            $remove_cart->delete();
            $this->emit('refreshPage');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Deleted cart successfully !',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Something went wrong !',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }


    public function render()
    {
        $this->carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.cart.index',['carts'=>$this->carts]);
    }
}
