<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequuest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.index');
    }
    public function create(){
        $categories = Category::where('status','0')->get();
       return view('admin.brand.create',['categories'=>$categories]);
    }
    public function store(BrandFormRequuest $request){
        $brands = Brand::create([
            'name' =>$request->name,
            'slug' =>$request->slug,
            'status' =>$request->status,
            'category_id' =>$request->category_id
        ]);
        if($request->has('categories')){
            $brands->categories()->attach($request->categories);
        }
        if($brands){
            return to_route('brands.index');
        }
    }

    public function edit(Brand $brand){
        $categories = Category::all();
        return view('admin.brand.edit',['brand'=>$brand,'categories'=>$categories]);
    }

    public function update(Request $request , Brand $brand){
        $brand->update([
            'name' =>$request->name,
            'slug' =>$request->slug,
            'status' =>$request->status,
            'category_id' =>$request->category_id
        ]);
        if($request->has('categories')){
            $brand->categories()->sync($request->categories);
        }
        return to_route('brands.index');
    }
    public function destroy(Brand $brand){
        $brand->categories()->detach();
        $brand->delete();
        return to_route('brands.index');
    }
}
