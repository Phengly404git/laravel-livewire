<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Count extends Component
{
    public $count_wishlist;
    // refreshPage

    protected $listeners = ['refreshPage'  => 'countWishlist'];

    public function countWishlist(){
        if(Auth::check()){
            return $this->count_wishlist = Wishlist::where('user_id',auth()->user()->id)->count();
        }
        return $this->count_wishlist = 0;
    }
    public function render()
    {
        $this->count_wishlist = $this->countWishlist();
        return view('livewire.frontend.wishlist.count',['count_wishlist'=>$this->count_wishlist]);
    }
}
