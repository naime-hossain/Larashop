<?php

namespace App\Http\Controllers;

use Alert;
use App\Category;
use Illuminate\Http\Request;
class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with('products')->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'name'=>'required|max:12|unique:categories'
            ]);
        $input=$request->all();
        Category::create($input);
        Alert::success('category Created');
        return redirect()->back()->with('message','Category created');
    }

    

   

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 

        $category=Category::findOrFail($id);
         $this->validate($request,[
        'name'=>'required|max:12|unique:categories'
            ]);
        $input=$request->all();
        $category->update($input);
        Alert::success('category updated');
        return back()->with('message','Category updated');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        Alert::warning('category Created');
        return back()->with('message','Category deleted');
    }
}
