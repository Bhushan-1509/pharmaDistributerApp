<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function handle(Request $request){
        $validated = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'location' => 'required'
        ]);

        return view('contact-us');
    }
}
