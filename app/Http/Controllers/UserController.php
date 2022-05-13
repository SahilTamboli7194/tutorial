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
                'email'=> 'required|email|min:6|max:50|unique:users,email',
                'password'=> 'required|min:6|max:10'
            ]);
            //$attributes['password']=bcrypt($attributes['password']);
        $user=User::create($attributes);
            auth()->login($user);
        return redirect('/')->with('success','your account has been created');
    }
}
