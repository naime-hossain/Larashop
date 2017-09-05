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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
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
    'state'=>'required','phone'=>'required','email'=>'required','address'=>'required',
    'city'=>'required'
       ]);
    // return $request->all();
    //check if customer uses their existing address or not.
    if ($request->address_id) {
           //verify if the address is belongs to htm/her if true proced to payment we should save the address id in session to make order.
        $user=Auth::user();
        $address=$user->addresses()->whereId($request->address_id)->first();
            if ($address) {
               //store a sesion for payment page to validte user go through checkout page
               $address->update($request->all()); 
               session(['accessToPayment' =>rand(10,1000*29)]);
               session(['addressId' =>$address->id]);
               // return session('addressId');
            }else{
               return back()->with('message','This address is not yours');
            }
       
    }else{

        $user=Auth::user();
       $address=$user->addresses()->create($request->all());
       session(['addressId' =>$address->id]);
       //store a sesion for payment page to validte user go through checkout page
       session(['accessToPayment' =>rand(10,1000*29)]);
    }
   Alert::success('You Are now alowed to Payment gateway')->autoclose(1500);
    // allow to payment gateway;
   return redirect(route('payment'));
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
