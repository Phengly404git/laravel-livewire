<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Livewire\Component;

class Index extends Component
{

    public function removeWishlist(int $wishlistId){
         Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->delete();
        $this->emit('refreshPage');
         $this->dispatchBrowserEvent('message',[
            'text' => 'Wishlist Remove Successfully !',
            'type' =>'success',
            'status' => 200
         ]);
    }

    public function render()
    {
        $wishlists = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist.index',['wishlists'=>$wishlists]);
    }
}
