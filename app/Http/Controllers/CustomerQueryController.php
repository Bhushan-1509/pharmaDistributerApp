<?php

namespace App\Http\Controllers;

use App\Models\CustomerQuery;
use Illuminate\Http\Request;

class CustomerQueryController extends Controller
{
    public function showQueries(Request $request){


        if(request()->query('search')){
            $searchParameter = $request->query('search');
            $customers = CustomerQuery::query('first_name','LIKE','%'.trim( $searchParameter) .'%')->orWhere('last_name','LIKE', trim($searchParameter))->orWhere('email','LIKE',trim($searchParameter))->get();
            if($customers){
                request()->session()->flash('search',true);
                return view('admin.customerqueries',['queries'=>$customers,
                    'noOfQueries' => $customers->count()
                ]);
            }
            else{
                return view('admin.customerqueries',['queries' => null , 'noOfQueries']);
            }
        }
        else {
            $customers = CustomerQuery::paginate(15);
            $noOfQueries = $customers->count();
            return view('admin.customerqueries',['queries' => $customers , 'noOfQueries' => $noOfQueries]);
        }
    }
    public function deleteQuery(Request $request){
        $paramVal = $request->post('paramVal');
        $customer = CustomerQuery::where('email','=',$paramVal)->first();
        $customer->delete();
        return redirect(route('customer_queries'));
    }
}
