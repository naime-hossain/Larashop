<?php

namespace App\Http\Controllers;

use Alert;
use App\Product;
use Cart;
use Illuminate\Http\Request;
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
       Alert::success('Good job!New item added to your cart')->autoclose(1000);
       return redirect()->back()->with('message','New item added to your cart');
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
         Alert::success('Good job! cart updated')->autoclose(1000);
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
         Alert::warning('Item removed from your cart')->autoclose(1000);
        return back()->with('message','Item remove from cart');
    }
}
