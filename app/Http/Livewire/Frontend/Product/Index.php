<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $category;
    public $brandInputs = [];
    public $priceInputs;

    protected $queryString = [
        'brandInputs'=>['except'=>'','as'=>'brand'],
        'priceInputs'=>['except'=>'','as'=>'price'],
    ];

    public function mount($category){
        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
                                    ->when($this->brandInputs,function($query){
                                        $query->whereIn('brand',$this->brandInputs);
                                    })
                                    ->when($this->priceInputs,function($query){
                                        $query->when($this->priceInputs == 'high-to-low',function($queryPrice){
                                            $queryPrice->orderBy('price','DESC');
                                        })
                                        ->when($this->priceInputs == 'low-to-high',function($queryPrice){
                                            $queryPrice->orderBy('cost_of_good','ASC');
                                        })
                                        ;
                                    })
                                    ->where('status','0')->get();
        return view('livewire.frontend.product.index',[
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
