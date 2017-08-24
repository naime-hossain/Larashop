<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all()->count();
        $products=Product::all()->count();
        $feature_products=Product::whereIsFeature(1)->get()->count();
        $available_products=Product::where('inStock','>',5)->get()->count();
        $notAvailable_products=Product::where('inStock','=',0)->get()->count();
        $lowStock_products=Product::where('inStock','<=',5)->get()->count();
        $orders=Order::all()->count();
        $delivered=Order::whereIs_deliver(1)->get()->count();
        $pending=Order::whereIs_deliver(0)->get()->count();
        $categories=Category::all()->count();
        $types=Type::all()->count();
        return view('admin.index',compact('users','categories','products','delivered','pending','types','orders','feature_products','available_products','notAvailable_products','lowStock_products'));
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
