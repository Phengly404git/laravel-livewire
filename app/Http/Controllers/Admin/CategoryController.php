<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
       return view('admin.category.index');
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request){
        // store image
        $images = $request->file('image')->store('public/categories');
        $category = Category::create([
            'name' =>$request->name,
            'slug' =>$request->slug,
            'title' =>$request->title,
            'keyword' =>$request->keyword,
            'description' =>$request->description,
            'short_description' =>$request->short_description,
            'status' =>$request->status,
            'image' =>$images,
        ]);
        if($category){
            return to_route('categories.index');
        }
    }

    public function show(Category $category){
        return view('admin.category.show',['category'=>$category]);
    }

    public function edit(Category $category){
        return view('admin.category.edit',['category'=>$category]);
    }

    public function update(Request $request,Category $category){

    //    delete image file
    $images = $category->image;
    if($request->hasFile('image')){
        Storage::delete($category->image);
        // add new file
        $images = $request->file('image')->store('public/categories');
    }
    // update field

    $category->update([
        'name' =>$request->name,
        'slug' =>$request->slug,
        'title' =>$request->title,
        'keyword' =>$request->keyword,
        'description' =>$request->description,
        'short_description' =>$request->short_description,
        'status' =>$request->status,
        'image' =>$images,
    ]);
    return to_route('categories.index');
    }

    public function destroy(Category $category){
        // delete image file
        Storage::delete($category->image);
        // $category->brands()->detach();
        $category->delete();
        return to_route('categories.index');
    }
}
