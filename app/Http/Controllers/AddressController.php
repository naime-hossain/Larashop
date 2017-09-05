<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller

{

 public function __construct(){
    $this->middleware('auth');
}
    

    /**
     * Store/or update a Adresses  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $this->validate($request,[
     'country'=>'required',
    'first_name'=>'required',
    'last_name'=>'required',
    'zip'=>'required',
    'state'=>'required','phone'=>'required','email'=>'required',
    'address'=>'required',
    'city'=>'required'
       ]);
    // return $request->all();
    //check if customer uses their existing address or not.
    if ($request->address_id) {
    //verify if the address is belongs to htm/her if true proced to payment we should save the address id in session to make order.
        $user=Auth::user();
        $address=$user->addresses()->whereId($request->address_id)->first();
            if ($address) {
             
       // update a address if custumer change thier existing address
               $address->update($request->all()); 
            //store a sesion for payment page to validte user go through checkout page
               session(['accessToPayment' =>rand(10,1000*29)]);
               // create a session for exixsting address id
               session(['addressId' =>$address->id]);
               // return session('addressId');
            }else{
               return back()->with('message','This address is not yours');
            }
       
    }else{
   // create new address 
        $user=Auth::user();
       $address=$user->addresses()->create($request->all());
       // create a session for exixsting address id
       session(['addressId' =>$address->id]);
       //store a sesion for payment page to validte user go through checkout page
       session(['accessToPayment' =>rand(10,1000*29)]);
    }
   Alert::success('You Are now alowed to Payment gateway')->autoclose(1500);
    // allow to payment gateway;
   return redirect(route('payment'));
  
    }

  
}
