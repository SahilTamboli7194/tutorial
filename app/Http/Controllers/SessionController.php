<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {

        $attribute =request()->validate([
            'email'=>'required|exists:users,email',
            'password'=>'required'
        ]);
        
        if(!auth()->attempt($attribute))
        {
            session()->regenerate();
            redirect('/')->with('success','welcome back');
        }

        throw ValidationException::withMessages([
            'email'=> 'Your Provided credentials  could not  be verified'
        ]);
        // return back()
        // ->withInput()
        // ->withErrors(['email'=> 'Your Provided credentials  could not  be verified']);
    }
    public function destroy(){

        //ddd('hello user for logout');

        auth()->logout();

        return redirect('/')->with('success','Good By!');
    }
}
