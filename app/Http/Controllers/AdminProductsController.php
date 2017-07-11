<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Type;
use App\Photo;
use Illuminate\Support\Facades\File;
class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(10);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id');
        $types=Type::pluck('name','id');
        return view('admin.products.create',compact('categories','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * $table->string('name');
            $table->text('description');
            $table->string('price');
            $table->integer('category_id');
            $table->string('size');
            $table->integer('is_available')->default(1);
     */
    public function store(Request $request)
    {
        $this->validate($request,[
             'name'=>'required|unique:products',
             'description'=>'required',
             'image'=>'required', 
             'category_id'=>'required',
             'type_id'=>'required',
             'size'=>'required',

            ]);

         $input=$request->except(['image','type_id']);
         // return $request->all();
       if ($input['category_id']==0) {
           $category=Category::create(['name'=>'uncategorized']);
           $input['category_id']=$category->id;
       }
        $product=Product::create($input);
         if ($request->hasFile('image')) {
            foreach ($request->image as $file)
             {
           $filename=rand(0,time()).$file->getClientOriginalName();
           $file->move('images/products',$filename);
           $product->photos()->create(['path'=>$filename]);
       }
        }
        $type=Type::find($request->type_id);
        if ($type) {
            $product->types()->attach($request->type_id);

        }

        return redirect(route('products.index'))->with(['message'=>'Product added succefully']);
        
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
       $product=Product::findOrFail($id);
        $categories=Category::pluck('name','id');
        $types=Type::pluck('name','id');
       return view('admin.products.edit',compact('product','categories','types'));
    }

 /**
     * detatch a specific photo from product.
     *
     * @param  product id
     * @param  int photo $id
     * @return \Illuminate\Http\Response
     */
    public function remove_photo($product_id,$photo_id){
        $product=Product::findorFail($product_id);
        $photo=Photo::findOrFail($photo_id);
        if ($photo->photoable->id==$product->id) {
           File::delete('images/products/'.$photo->path);
           $product->photos()->whereId($photo->id)->delete();
           return back()->with(['message'=>'photo removed']);
        }
    
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

       $product=Product::findOrFail($id);
        $input=$request->except(['image','type_id','new_type']);
         // return $request->all();
       if ($input['category_id']==0) {
           $category=Category::create(['name'=>'uncategorized']);
           $input['category_id']=$category->id;
       }
          $product->update($input);
         if ($request->hasFile('image')) {
            foreach ($request->image as $file)
             {
           $filename=rand(0,time()).$file->getClientOriginalName();
           $file->move('images/products',$filename);
           $product->photos()->create(['path'=>$filename]);
       }
        }
        $typeToAdd=Type::find($request->type_id);
        if ($typeToAdd) {
             foreach ($product->types as $type) {
                 if ($typeToAdd->id!=$type->id) {
                      $product->types()->attach($typeToAdd->id);
                 }
             }
           

        }
         if ($request->new_type) {
              $product->types()->create(['name'=>$request->new_type]);
            }

        return redirect(route('products.index'))->with(['message'=>'Product Updated succefully']);
        
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
