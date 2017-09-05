<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Product;
use App\Size;
use App\Type;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::with('category','types','reviews','sizes')->latest()->take(5)->get();
        $feature_products=Product::with('category','types','reviews','sizes')->latest()->whereIs_feature(1)->take(5)->get();
         // $popular_products=Product::has('reviews', '>=', 2)->with('category','types','reviews','sizes')->latest()->take(5)->get();
         $popular_products=Product::where('rating', '>=',4)->with('category','types','reviews','sizes')->latest()->take(5)->get();
        

        return view('welcome',compact('products','feature_products','popular_products'));
    }

    /**
     * Show all the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function Products()
    {
        //
        $products=Product::with('category','types','reviews','sizes')->paginate(6);
        return view('products.index',compact('products'));
    }

     /**
     * Show  the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function Product($slug)
    {
        //
        $product=Product::with('category','types','reviews','sizes')->whereSlug($slug)->firstOrFail();
        
     $category=$product->category;
     $sizes=$product->sizes()->pluck('name','name');
     $colors=$product->colors()->pluck('name','name');

// find the similar product for single page
         $similar_products=$category->products()->with('category','types','reviews','sizes')->where('id','<>',$product->id)->take(4)->inRandomOrder()->get();
        return view('products.show',compact('product','similar_products','sizes','colors'));
    }


    /**
     * show resource for archive page.
     *
     * @param  archive_type
     * @param archive _name
     */
    public function archive($archive_type,$archive_name)
    {
       switch ($archive_type) {
           case 'category':
               $name=Category::whereName($archive_name)->firstOrfail();
                if ($name) {
                     $products=$name->products()->with('category','types')->get();
                }else{
                 
                }
              
               return view('archive.index',compact('name','products','archive_type','archive_name'));
               break;
                case 'type':
               $name=Type::whereName($archive_name)->first();
                if ($name) {
                     $products=$name->products()->with('category','types')->get();
                }else{
                 
                }
               return view('archive.index',compact('name','products','archive_type','archive_name'));
               break;
                case 'size':
                $name=Size::whereName($archive_name)->first();
                 if ($name) {
                     $products=$name->products()->with('category','types')->get();
                }else{
                 
                }
               return view('archive.index',compact('name','products','archive_type','archive_name'));
               break;

           
           default:
               return back();
               break;
       }
    }

  
    

    
}
