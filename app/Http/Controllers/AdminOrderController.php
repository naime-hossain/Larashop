<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class AdminOrderController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status='')
    {
      
           if ($status=='deliver') {
             $orders=Order::with('products','address','user')->whereIs_deliver(1)->paginate(5);
        }elseif($status=='pending'){
          $orders=Order::with('products','address','user')->whereIs_deliver(0)->paginate(5);
        }else{
              $orders=Order::with('products','address','user')->paginate(5);
        }
        return view('admin.orders.index',compact('orders'));
    }

       /**
     * Display a listing of the orders that pending.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $orders=Order::with('products','address','user')->whereIs_deliver(0)->paginate(5);
        return view('admin.orders.pending',compact('orders'));
    }

       /**
     * Display a listing of the orders that delivered.
     *
     * @return \Illuminate\Http\Response
     */
    public function delivered()
    {
        $orders=Order::with('products','address','user')->whereIs_deliver(1)->paginate(5);
        return view('admin.orders.delivered',compact('orders'));
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
       $order=Order::findOrFail($id);
       $order->is_deliver=1;
       $order->save();
       return back()->with('message','order marked as delivered');
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
