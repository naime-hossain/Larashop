<?php

namespace App\Http\Controllers;

use Alert;
use App\Jobs\SendOrderConfirmationEmail;
use App\Mail\OrderConformation;
use App\Order;
use App\Product;
use App\ShopSetting;
use App\User;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
class CheckoutController extends Controller
{

public function __construct(){
    $this->middleware('auth');
}

    /**
     * check a user log in or not
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        // final check if the item is in stock limit or not
            $cartItems=Cart::content();
            foreach ($cartItems as $item) {
               $product=Product::find($item->id);
               if ($item->qty>$product->inStock) {
                  Alert::warning("$product->name has $product->inStock  piece available but you try to order $item->qty  piece")->autoclose(2000);
                  return redirect('/cart')->with('message',"$product->name has $product->inStock  piece available but you try to order $item->qty  piece");
               }
            }

            if ($cartItems->count()>0) {
                $addresses=Auth::user()->addresses;
                return view('checkout.shipingInfo',compact('cartItems','addresses'));
            }else{
                return redirect(route('home'))->with('message','your cart is empty!add some product :)');
            }
            
       
        
    }

    /**
     * Show the form for creating a new order by pay bill.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentForm(Request $request)
    {

        if ($request->session()->has('accessToPayment')) {
             $cartItems=Cart::content();
            return view('checkout.paymentform',compact('cartItems'));
        }
        return redirect(route('checkout'))->with('message','complete the checkout processs first then procced to payment');
       
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
      'currency' =>ShopSetting::first()?ShopSetting::first()->currency:'usd',
  ));
    if ($charge) {
        Alert::success('Good job!Payment recieved')->autoclose(1000);
        return redirect(route('order.store'));
    }

    }




    /**
     * Store details of order in databse.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function placeOrder(Request $request)
    {
       // after making the payment
// 01.empty cart
// 02.destroy the accessToPayment session
// make the order in order tabel
// create a order token for each order for tracking
//destroy the sessoon

$cartItems=Cart::content();
$addressId=$request->session()->get('addressId');
$user=Auth::user();
//crrate random token for each order
$ordrToken=bcrypt($user->name.str_random(100000*10));
//make an order
$order=$user->orders()->create(['address_id'=>$addressId,'order_token'=>$ordrToken,'total'=>Cart::total()]);

foreach ($cartItems as $item) {
     $product=Product::findOrFail($item->id);
     $order->products()->attach($item->id,['qty'=>$item->qty,'total'=>$item->total(),'size'=>$item->options->size,'color'=>$item->options->color]);

     //now need reduce the product from in stock
    $remainingStock=($product->inStock-$item->qty);

    $product->inStock=$remainingStock;
    $product->save();
     

}
 //now need to send email to customr

// $job = (new SendOrderConfirmationEmail($order,$user))
//                     ->delay(Carbon::now()->addSeconds(10));
//     dispatch($job);

  Mail::to($user)->send(new OrderConformation($order));

//destroy the accesstoPayment toekn
$request->session()->forget('accessToPayment');

//make the cart empty
  Cart::destroy();

//destroy the addressID session after place order
  $request->session()->forget('addressId');


 Alert::success('Good job!Your oder is placed plaese wait for the delivery')->autoclose(1000);
  return redirect()->route('home')->with('message','Your oder is placed plaese wait for the delivery');
    }

    

    
}
