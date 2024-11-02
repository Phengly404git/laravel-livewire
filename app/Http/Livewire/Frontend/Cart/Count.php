<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Count extends Component
{

    public $cart_count;

    protected $listeners = ['refreshPage' => 'checkCartCount'];

    public function checkCartCount(){
        if(Auth::check()){
            return $this->cart_count = Cart::where('user_id',auth()->user()->id)->count();
        }
        else{
           return $this->cart_count = 0;

        }
    }
    public function render()
    {
        $this->cart_count = $this->checkCartCount();
        return view('livewire.frontend.cart.count',['cart_count'=>$this->cart_count]);
    }
}
