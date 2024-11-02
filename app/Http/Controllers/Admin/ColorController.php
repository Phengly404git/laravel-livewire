<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function index()
    {
        $colors = Color::orderBy('id','desc')->paginate(10);
       return view('admin.color.index',['colors'=>$colors]);
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(ColorFormRequest $request)
    {
        $colors = Color::create([
            'name' =>$request->name,
            'code' =>$request->code,
            'status' =>$request->status
        ]);
        if($colors){
            return to_route('colors.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit',['color'=>$color]);
    }

    public function update(Request $request, Color $color)
    {
        $color->update([
            'name' =>$request->name,
            'code' =>$request->code,
            'status' =>$request->status,
        ]);
        return to_route('colors.index');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return to_route('colors.index');
    }
}
