<?php

namespace App\Http\Controllers;

use Alert;
use App\Type;
use Illuminate\Http\Request;
class AdminTypesController extends Controller
{
     /**
     * Display a listing of the Type.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::with('products')->paginate(10);
        return view('admin.types.index',compact('types'));
    }

    

    /**
     * Store a newly created Type in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'name'=>'required|max:12|unique:types'
            ]);
        $input=$request->all();
        Type::create($input);
        Alert::success('Type Added');
        return back()->with(['message'=>'Type created']);
    }

    
    

    /**
     * Update the specified Type in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 

        $type=Type::findOrFail($id);
         $this->validate($request,[
        'name'=>'required|max:12|unique:types'
            ]);
        $input=$request->all();
        $type->update($input);
        Alert::success('Type Updated');
        return back()->with(['message','Type updated']);
    }

    /**
     * Remove the specified Type from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type=Type::findOrFail($id);
        $type->delete();
        Alert::warning('Type Deleted');
        return back()->with(['message'=>'Type deleted']);
    }
}
