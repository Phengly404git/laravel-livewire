<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('admin.product.index',['products'=>$products]);
    }

    public function create(){
        $categories = Category::where('status','0')->get();
        $brands = Brand::where('status','0')->get();
        $colors = Color::where('status','0')->get();
        return view('admin.product.create',['categories'=>$categories,'brands'=>$brands,'colors'=>$colors]);
    }

    public function store(ProductFormRequest $request){
        $images = $request->file('image')->store('public/products');
        $product = Product::create([
            'name' =>$request->name,
            'slug' =>Str::slug($request['slug']),
            'title' =>$request->title,
            'category_id'=>$request->category_id,
            'brand'=>$request->brand,
            'keyword' =>$request->keyword,
            'quantity' =>$request->quantity,
            'cost_of_good' =>$request->cost_of_good,
            'price' =>$request->price,
            'status' =>$request->status,
            'trending' =>$request->trending,
            'short_description' =>$request->short_description,
            'description' =>$request->description,
            'color' =>$request->color,
            'image' =>$images,
        ]);
        if($request->has('categories')){
            $product->categories()->attach($request->categories);
        }
        if($request->has('brands')){
            $product->brands()->attach($request->brands);
        }
        if($request->has('colors')){
            $product->colors()->attach($request->colors);
        }
        return to_route('products.index');
    }

    public function show(Product $product){
        return view('admin.product.show',['product'=>$product]);
    }
    public function edit(Product $product){
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
       return view('admin.product.edit',['product'=>$product,'categories'=>$categories,'brands'=>$brands,'colors'=>$colors]);
    }
    public function update(Request $request,Product $product){
        $images = $product->image;
        if($request->hasFile('image')){
            // delete file
            Storage::delete($product->image);
            // store new file
            $images = $request->file('image')->store('public/products');
        }
        $product->update([
            'name' =>$request->name,
            'slug' =>Str::slug($request['slug']),
            'title' =>$request->title,
            'category_id'=>$request->category_id,
            'brand'=>$request->brand,
            'keyword' =>$request->keyword,
            'quantity' =>$request->quantity,
            'cost_of_good' =>$request->cost_of_good,
            'price' =>$request->price,
            'status' =>$request->status,
            'trending' =>$request->trending,
            'short_description' =>$request->short_description,
            'description' =>$request->description,
            'color' =>$request->color,
            'image' =>$images,
        ]);

        if($request->has('categories')){
            $product->categories()->sync($request->categories);
        }
        if($request->has('brands')){
            $product->brands()->sync($request->brands);
        }
        if($request->has('colors')){
            $product->colors()->sync($request->colors);
        }

        return to_route('products.index');
    }
    public function destroy(Product $product){
        // delete image file
        Storage::delete($product->image);
        $product->delete();
        return to_route('products.index');
    }
}
