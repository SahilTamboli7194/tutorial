<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(){
        return view('user.register');
    }

    public function store(){
        //return request()->all();
            $attributes=request()->validate([
                'name'=> 'required|min:3|max:50',
                'username'=> 'required|min:3|unique:users,username',
                'email'=> 'required|email|min:6|max:15|unique:users,email',
                'password'=> 'required|min:6|max:10'
            ]);
            $attributes['password']=bcrypt($attributes['password']);
         User::create($attributes);
            session()->flash('success','your account has been created');
        return redirect('/');
    }
}
