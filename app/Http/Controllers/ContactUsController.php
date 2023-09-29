<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\CustomerQuery;
use Illuminate\Support\Facades\Http;

class ContactUsController extends Controller
{
    public function handle(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'location' => 'required'
        ]);
        $captchaRes = $request->post('g-recaptcha-response');
        $httpRes = "";
        if(isset($captchaRes)){
             $httpRes = Http::withHeaders([
                 'Content-Type' => 'application/x-www-form-urlencoded'
             ])->post("https://www.google.com/recaptcha/api/siteverify?secret=" . env('RECAPTCHA_SECRET_KEY') . "&". "response=". $captchaRes)->throw()->json();
        }
        else{
            return view('contact-us', [
                'class' => 'alert alert-danger',
                'text' => 'Please tick captcha field'
            ]);
        }

        $query = new CustomerQuery();
        if ($httpRes["success"] == true) {
            $query->first_name = $request->firstName;
            $query->last_name = $request->lastName;
            $query->email = $request->email;
            $query->phone = $request->phone;
            $query->location = $request->location;
            $query->msg = $request->msg;
            $result = $query->save();
            if($result){
                return view('contact-us', [
                    'class' => 'alert alert-success col-sm-12',
                    'text' => 'Your query posted sucessfully ! we will respond to your query'
                ]);

            }

            }
        else {

            return view('contact-us', [
                'class' => 'alert alert-danger col-sm-12',
                'text' => 'Could not post your query ! Try after some time.'
            ]);
        }


    }
}
