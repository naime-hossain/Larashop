<?php

namespace App\Http\Controllers;

use Alert;
use App\Product;
use Cart;
use Illuminate\Http\Request;
class CartController extends Controller
{
    /**
     * Display a listing of the cart item.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cartItems=Cart::content();


         return view('cart.index',compact('cartItems'));
    }

   
    /**
     * Add item to cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request,$id)
    {
       $this->validate($request,[
        // 'size'=>'required',
        // 'color'=>'required',
        'qty'=>'required',
        ]);
       $product=Product::findOrFail($id);
        $cartItems=Cart::content();
        // check the product quantity
            foreach ($cartItems as $item) {
          
             // check the item is already in cart or not
               if ($item->id==$product->id) {
                // total item to add in cart
                     $itemorder=$request->qty+$item->qty;
                    if ($product->inStock<$itemorder) {
            Alert::warning("$product->name has $product->inStock  piece available but you try to order $itemorder piece")->autoclose(2000);
           return back()->with('message',"$product->name has $product->inStock  piece available but you try to order $itemorder  piece");
              }

                  
                  
               }
               // if the product is not in cart already then
               elseif($product->inStock<$request->qty){
                   Alert::warning("$product->name has $product->inStock  piece available but you try to order $request->qty piece")->autoclose(2000);
           return back()->with('message',"$product->name has $product->inStock  piece available but you try to order $request->qty  piece");
               }
            }

      // if all check is true then add product in cart
       Cart::add($id,$product->name,$request->qty,$product->price,['size'=>$request->size,'color'=>$request->color]);
       Alert::success('Good job!New item added to your cart')->autoclose(1000);
       return redirect()->back()->with('message','New item added to your cart');
    }

    /**
     * Update the specified cart item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($request->id);
        $cartItems=Cart::content();
        // check the product quantity
            foreach ($cartItems as $item) {
          
             // check the item is already in cart or not
               if ($item->id==$product->id) {
                // total item to add in cart
                     $itemorder=$request->qty;
                    if ($product->inStock<$itemorder) {
            Alert::warning("$product->name has $product->inStock  piece available but you try to order $itemorder piece")->autoclose(2000);
           return back()->with('message',"$product->name has $product->inStock  piece available but you try to order $itemorder  piece");
              }

                  
                  
               }
               // if the product is not in cart already then
               elseif($product->inStock<$request->qty){
                   Alert::warning("$product->name has $product->inStock  piece available but you try to order $request->qty piece")->autoclose(2000);
           return back()->with('message',"$product->name has $product->inStock  piece available but you try to order $request->qty  piece");
               }
            }

        $cartUpdate=Cart::update($id,['qty'=>$request->qty,'options'=>['size'=>"$request->size",'color'=>$request->color]]);
         Alert::success('Good job! cart updated')->autoclose(1000);
        return back()->with('message','cart updated');
    }

    /**
     * Remove the specified cart item from storage.
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
