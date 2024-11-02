<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('status','0')->get();
        $trending_products = Product::where('trending','0')->latest()->take(12)->get();
        $new_arrival_products = Product::latest()->take(12)->get();
        return view('frontend.index',[
            'sliders'=>$sliders,
            'trending_products'=>$trending_products,
            'new_arrival_products' => $new_arrival_products
        ]);
    }
}
