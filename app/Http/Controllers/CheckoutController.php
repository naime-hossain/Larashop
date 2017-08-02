<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
 use Stripe\Customer;

 use Cart;
use App\Product;
class CheckoutController extends Controller
{
    /**
     * check a user log in or not
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        if (
        Auth::check()) {
            return view('checkout.shipingInfo');
        } else {
            return view('auth.login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentForm()
    {
        return view('checkout.paymentform');
    }

    /**
     * storePayment a newly created resource in storage for shiping info.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePayment(Request $request)
    {
       
        Stripe::setApiKey(config('services.stripe.secret'));
       $customer =Customer::create(array(
      'email' => $request->stripeEmail,
      'source'  =>$request->stripeToken,
  ));

  $charge =Charge::create(array(
      'customer' => $customer->id,
      'amount'   => Cart::total()*100,
      'currency' => 'usd'
  ));

  return "Successfully charged  Cart::total()";
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
