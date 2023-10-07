<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerQueryController extends Controller
{
    public function showQueries(Request $request){
        return view('admin.customerqueries');
    }
}
