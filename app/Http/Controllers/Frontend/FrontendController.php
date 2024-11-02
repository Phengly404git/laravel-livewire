<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public  function index(){
        $sliders = Slider::where('status','0')->get();
        $trending_products = Product::where('trending','0')->latest()->take(12)->get();
        $new_arrival_products = Product::latest()->take(12)->get();
        return view('frontend.index',[
            'sliders'=>$sliders,
            'trending_products'=>$trending_products,
            'new_arrival_products' => $new_arrival_products
        ]);
    }

    public function newArrivals(){
       $new_arrival_products = Product::latest()->take(12)->get();
       return view('frontend.page.index',[
        'new_arrival_products' =>$new_arrival_products
       ]);
    }

    public function categories(){
        $categories = Category::where('status','0')->paginate(12);
       return view('frontend.collections.category.index',['categories'=>$categories]);
    }

    public function products(){
        $products = Product::orderBy('id','desc')->paginate(18);
        return view('frontend.page.product',[
            'products'=>$products
        ]);
    }

    public function categoryProducts($category_slug){
        $category = Category::where('slug',$category_slug)->first();

        if($category){
            return view('frontend.collections.product.index',['category'=>$category]);
        }
        return redirect()->back();
    }

    public function productDetails(string $category_slug, string $product_slug){

        $category = Category::where('slug',$category_slug)->first();
        if($category){
            $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();
            if($product){
                return view('frontend.collections.product.details',['category'=>$category,'product'=>$product]);
            }
            else{
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

    public function thankYou(){
        return view('frontend.thank_you');
    }

    public function searchProduct(Request $request){
       if($request->search){
            $search_product = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(18);
            return view('frontend.page.search',[
                'search_product' =>$search_product
            ]);
       }
       else{
            return redirect()->back()->with('message','Product Not Found !');
       }
    }


}
