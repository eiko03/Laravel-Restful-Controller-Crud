<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcMail;
use App\Mail\ByeMail;
use App\Customer;

class CustomerController extends Controller
{

    public function index(Request $request){
        $customers= \App\Customer::where('active',$request->query('active',1) )->get();
        return view('customer.index',compact('customers'));

    }
    public function create(){
        $customer=new Customer();
        return view('customer.create',compact('customer'));

    }
    public function store(){

        $customer= \App\Customer::create($this->validatedData());
        //$cus= new $customer;
        Mail::to($customer->email)->send(new WelcMail($customer));
        return redirect('/customers/'.$customer->id);
    }
    public function show(\App\Customer $customer){
        //$customer= \App\Customer::findorFail($customerID);

        return view('customer.show',compact('customer'));


    }
    public function edit(\App\Customer $customer){

        return view('customer.edit',compact('customer'));
    }
    public function update(\App\Customer $customer){

        $customer->update($this->validatedData());
        //\App\Customer::create($data);
        return redirect('/customers');
    }
    public function distroy(\App\Customer $customer){
        Mail::to($customer->email)->send(new ByeMail());
        $customer->delete();
        return redirect('/customers');

    }
    protected function validatedData(){
        return request()->validate([
            'name'=>'required|min:2',
            'email'=>'required|email'
        ]);

    }

}
