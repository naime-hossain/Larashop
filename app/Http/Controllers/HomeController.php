<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Type;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->take(5)->get();
        return view('welcome',compact('products'));
    }

    /**
     * Show all the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function Products()
    {
        //
        $products=Product::paginate(6);
        return view('products.index',compact('products'));
    }

     /**
     * Show all the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function Product($id)
    {
        //
        $product=Product::findOrFail($id);
        return view('products.show',compact('product'));
    }


    /**
     * show resource for archove page.
     *
     * @param  archive_type
     * @param archive _name
     */
    public function archive($archive_type,$archive_name)
    {
       switch ($archive_type) {
           case 'category':
               $name=Category::whereName($archive_name)->first();
                if ($name) {
                     $products=$name->products;
                }else{
                 
                }
              
               return view('archive.index',compact('name','products','archive_type','archive_name'));
               break;
                case 'type':
               $name=Type::whereName($archive_name)->first();
                if ($name) {
                     $products=$name->products;
                }else{
                 
                }
               return view('archive.index',compact('name','products','archive_type','archive_name'));
               break;
                case 'size':
                $name='';
               $products=Product::whereSize($archive_name)->get();
               
               return view('archive.index',compact('archive_name','products','archive_type','name'));
               break;

           
           default:
               return back();
               break;
       }
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