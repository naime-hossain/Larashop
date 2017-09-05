<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
class ReviewController extends Controller
{
   

    /**
     * Store a newly created review in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$product_id)
    {
        
     $this->validate($request,[
        'rating'=>'required',
        'review'=>'required',
        ]);
     $input=$request->all();
     $product=Product::findOrFail($product_id);
     $user=Auth::user();
     // check if the user already give review or not
     $user_review=$user->reviews()->whereProduct_id($product_id)->first();
       if ($user_review) {
        Alert::warning('You already give review this product')->autoclose(1500);
           return back()->with('message','You already give review this product');
       }
     $input['user_id']=$user->id;
     $product->reviews()->create($input);
     // update product rating
     $rating=$product->reviews()->sum('rating')/$product->reviews()->count();
     $product->rating=$rating;
     $product->save();
     Alert::success('Good Job ! review added')->autoclose(1500);
     return back()->with('message','review added');

    }

   

    /**
     * Show the form for editing the specified review.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified review in storage.
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
     * Remove the specified review from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
