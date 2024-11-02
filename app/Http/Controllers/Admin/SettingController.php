<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        return view('admin.setting.index');
    }

    public function create()
    {
        return view('admin.setting.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {


             $setting = Setting::create([
                'name'        =>$request->name,
                'url'         =>$request->url,
                'title'       =>$request->title,
                'keyword'     =>$request->keyword,
                'description' =>$request->description,
                'phone1'      =>$request->phone1,
                'phone2'      =>$request->phone2,
                'email1'      =>$request->email1,
                'email2'      =>$request->email2,
                'address'     =>$request->address,
                'facebook'    =>$request->facebook,
                'twitter'     =>$request->twitter,
                'instagram'   =>$request->instagram,
                'youtube'     =>$request->youtube
            ]);
            if($setting){
                return to_route('settings.index')->with('message','Settings Created Successfully !');
            }


    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
