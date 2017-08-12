<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cartItems=Cart::content();
         return view('cart.index',compact('cartItems'));
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
        //
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
     * Add item to cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request,$id)
    {

       $product=Product::findOrFail($id);
       if ($product->inStock<$request->qty) {
           return back()->with('message','This  Product Quantity is not enough for your order.only '.$product->inStock.' piece available');
       }
       Cart::add($id,$product->name,$request->qty,$product->price,['size'=>$product->size,'stock'=>$product->inStock]);
       return back()->with('message','New item added to your cart');
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
       
        $cartUpdate=Cart::update($id,['qty'=>$request->qty,'options'=>['size'=>"$request->size"]]);
        return back()->with('message','cart updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('message','item remove from cart');
    }
}
