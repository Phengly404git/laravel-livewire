<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->paginate(10);
        return view('admin.slider.index',['sliders'=>$sliders]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request)
    {
        $images = $request->file('image')->store('public/sliders');
        $slider = Slider::create([
            'title' =>$request->title,
            'status' =>$request->status,
            'description' =>$request->description,
            'image' =>$images,
        ]);
        if($slider){
            return to_route('sliders.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',['slider'=>$slider]);
    }

    public function update(Request $request, Slider $slider)
    {
        $images = $slider->image;
        if($request->hasFile('image')){
           Storage::delete($slider->image);
            $images = $request->file('image')->store('public/sliders');
        }
        $slider->update([
            'title'=>$request->title,
            'status'=>$request->status,
            'description'=>$request->description,
            'image' =>$images
        ]);

        return to_route('sliders.index');
    }

    public function destroy(Slider $slider)
    {
        Storage::delete($slider->image);
        $slider->delete();
        return to_route('sliders.index');
    }
}
