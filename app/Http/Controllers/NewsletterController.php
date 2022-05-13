<?php

namespace App\Http\Controllers;

use App\Services\newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(newsletter $newsletter)
    {
        request()->validate([
            'email'=> 'required|email'
        ]);
    
        try {
            $newsletter = new NewsLetter;
    
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email'=>'this email could not added be to our newsletter'
            ]);
        }
    
        return back()->with('success','You are now signup for newsletter');
    }
}
