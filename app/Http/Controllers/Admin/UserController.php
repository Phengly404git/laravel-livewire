<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id','desc')->paginate(10);
        return view('admin.user.index',[
            'users'=>$users
        ]);
    }

    public function create(){
        return view('admin.user.create');
    }
    public function store(UserRequest $request){

       $user = User::create([
        'name' =>$request->name,
        'email' =>$request->email,
        'password' =>Hash::make($request->password),
        'role' =>$request->role,
       ]);
       if($user){
        return to_route('users.index')->with('success','User Created Successfully !');
       }
    }

    public function edit(User $user){
        return view('admin.user.edit',[
            'user'=>$user
        ]);
    }

    public function update(Request $request, User $user){
        $user->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'role' =>$request->role,
        ]);
        if($user){
            return to_route('users.index')->with('success','User Updated Successfully !');
        }
    }

    public function destroy(User $user){
        $user->delete();
        return to_route('users.index');
    }
}
