<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $brands = Brand::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.brand.index',['brands'=>$brands]);
    }
}
