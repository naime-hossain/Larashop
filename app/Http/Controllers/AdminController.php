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
     * Display a listing of the resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // number of users in databse
        $users=User::all()->count();
        // number of products in databse
        $products=Product::all()->count();
        // number of feature products in databse
        $feature_products=Product::whereIsFeature(1)->get()->count();
        // number of products that are available more than 5 piece
        $available_products=Product::where('inStock','>',5)->get()->count();
        // number of products that 0 piece 
        $notAvailable_products=Product::where('inStock','=',0)->get()->count();
        // number of products that are available less than or equal 5 piece
        $lowStock_products=Product::where('inStock','<=',5)->get()->count();
        // number of Orders Placed by users
        $orders=Order::all()->count();
        // number of Orders that are Delivered to users
        $delivered=Order::whereIs_deliver(1)->get()->count();
        // number of Orders that are not delivered to users
        $pending=Order::whereIs_deliver(0)->get()->count();
        // number of Categories
        $categories=Category::all()->count();
        // number of products type
        $types=Type::all()->count();

        return view('admin.index',compact('users','categories','products','delivered','pending','types','orders','feature_products','available_products','notAvailable_products','lowStock_products'));
    }

    
}
