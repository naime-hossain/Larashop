<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Photo;
use App\Product;
use App\Size;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::with('photos','types','category')->paginate(10);
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

        $colors =Color::pluck('name')->toArray();
        $colors =implode(',',$colors);
         $sizes =Size::pluck('name')->toArray();
         $sizes=implode(',',$sizes);

        return view('admin.products.create',compact('categories','types','colors','sizes'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
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
             'color'=>'required',
             'inStock'=>'required',

            ]);

        $input=$request->except(['image','type_id','size','
         color']);
        if (!$request->is_feature) {
           $input['is_feature']=0;
        }else{
            // return $request->is_feature;
        }
       

         
         // return $request->all();
       if ($input['category_id']==0) {
           $category=Category::create(['name'=>'uncategorized']);
           $input['category_id']=$category->id;
       }
       $input['slug']=str_slug($request->name,'-');
        $product=Product::create($input);
         if ($request->hasFile('image')) {
            foreach ($request->image as $file)
             {
           

             // use intervention image to crop the images
             $filename= $product->name.rand(0,time()).$file->getClientOriginalName();
          Image::make($file)->fit(360, 300)->save('images/products/thumbs/'.$filename);
          Image::make($file)->fit(1000, 800)->save('images/products/'.$filename);
           $product->photos()->create(['path'=>$filename]);
         }
        }

        // add product type
        $type=Type::find($request->type_id);
        if ($type) {
            $product->types()->attach($request->type_id);

        }
        // attach or create product size
        $sizes=explode(',',$request->size);
        foreach ($sizes as $name) {
            $size=Size::whereName($name)->first();
            if ($size) {
                $product->sizes()->attach($size->id);
            }else{
                $product->sizes()->create(['name'=>$name]);
            }
        }

          // attach or create product color
        $colors=explode(',',$request->color);
        foreach ($colors as $name) {
            $color=Color::whereName($name)->first();
            if ($color) {
                $product->colors()->attach($color->id);
            }else{
                $product->colors()->create(['name'=>$name]);
            }
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
        $types=$product->types()->pluck('name')->toArray();
        $types =implode(',',$types);
         $colors =$product->colors()->pluck('name')->toArray();
        $colors =implode(',',$colors);
         $sizes =$product->sizes()->pluck('name')->toArray();
         $sizes=implode(',',$sizes);
       return view('admin.products.edit',compact('product','categories','types','sizes','colors'));
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
           File::delete('images/products/thumbs/'.$photo->path);
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
          $input=$request->except(['image','type','size','color']);
        if (!$request->is_feature) {
           $input['is_feature']=0;
        }else{
            // return $request->is_feature;
        }
         // return $request->all();
       if ($input['category_id']==0) {
           $category=Category::create(['name'=>'uncategorized']);
           $input['category_id']=$category->id;
       }
          $product->update($input);
         if ($request->hasFile('image')) {
            foreach ($request->image as $file)
             {
            // use intervention image to crop the images
             $filename= $product->name.rand(0,time()).$file->getClientOriginalName();
          Image::make($file)->fit(360, 300)->save('images/products/thumbs/'.$filename);
          Image::make($file)->fit(1000, 800)->save('images/products/'.$filename);
           $product->photos()->create(['path'=>$filename]);
       }
        }

// attach type old way
        // $typeToAdd=Type::find($request->type_id);
        // if ($typeToAdd) {
        //      foreach ($product->types as $type) {
        //          if ($typeToAdd->id!=$type->id) {
        //               $product->types()->attach($typeToAdd->id);
        //          }
        //      }
           

        // }
        //  if ($request->new_type) {
        //       $product->types()->create(['name'=>$request->new_type]);
        //     }

        // attach or create product type
        $types=explode(',',$request->type);
        foreach ($types as $name) {
            $type=Type::whereName($name)->first();
            if ($type) {
                $type_id[]=$type->id;
            }else{
                $new_type=Type::create(['name'=>$name]);
                $type_id[]=$new_type->id;
            }
            $product->types()->sync($type_id);
        }


                   // attach or create product size
        $sizes=explode(',',$request->size);
        foreach ($sizes as $name) {
            $size=Size::whereName($name)->first();
            if ($size) {
                $size_id[]=$size->id;
            }else{
                $new_size=Size::create(['name'=>$name]);
                $size_id[]=$new_size->id;
            }
            $product->sizes()->sync($size_id);
        }

          // attach or create product color
        $colors=explode(',',$request->color);
        foreach ($colors as $name) {
            $color=Color::whereName($name)->first();
              if ($color) {
                $color_id[]=$color->id;
            }else{
                $new_color=Color::create(['name'=>$name]);
                $color_id[]=$new_color->id;
            }
            $product->colors()->sync($color_id);
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
        $product=Product::findOrFail($id);
        if ($product->photos) {
            foreach ($product->photos as $photo) {
               File::delete('images/products/'.$photo->path);
               File::delete('images/products/thumbs/'.$photo->path);
            
            }
            $product->photos()->delete();
        }
        $product->delete();
        return redirect(route('products.index'))->with(['message'=>'Product removed']);
    }
}
