<?php

namespace App\Http\Controllers;

use App\Models\CustomerQuery;
use Illuminate\Http\Request;

class CustomerQueryController extends Controller
{
    public function showQueries(Request $request){
        $customersByfirstName = null;
        $customersByLastName = null;
        $customersByEmail = null;

        if(request()->query('search')){
            $searchParameter = $request->query('search');
            $customersByfirstName = CustomerQuery::where('first_name','like','%'. $searchParameter .'%')->get();
            $customersByLastName  = CustomerQuery::where('last_name','like','%'. $searchParameter .'%')->get();
            $customersByEmail  = CustomerQuery::where('email','like','%'. $searchParameter .'%')->get();

            if($customersByfirstName){
                request()->session()->flash('search',true);
                return view('admin.customerqueries',['queries'=>$customersByfirstName,
                    'noOfQueries' => $customersByfirstName->count()
                ]);
            }
            else if($customersByLastName){
                request()->session()->flash('search',true);
                return view('admin.customerqueries',['queries'=>$customersByLastName,
                    'noOfQueries' => $customersByLastName->count()
                ]);
            }
            else if($customersByEmail){
                request()->session()->flash('search',true);
                return view('admin.customerqueries',['queries'=>$customersByEmail,
                    'noOfQueries' => $customersByEmail->count()
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
