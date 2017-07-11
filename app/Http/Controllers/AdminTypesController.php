<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
class AdminTypesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::paginate(10);
        return view('admin.types.index',compact('types'));
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
        $this->validate($request,[
        'name'=>'required|max:12|unique:types'
            ]);
        $input=$request->all();
        Type::create($input);
        return back()->with(['message'=>'Type created']);
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

        $type=Type::findOrFail($id);
         $this->validate($request,[
        'name'=>'required|max:12|unique:types'
            ]);
        $input=$request->all();
        $type->update($input);
        return back()->with(['message'=>'Type updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type=Type::findOrFail($id);
        $type->delete();
        return back()->with(['message'=>'Type deleted']);
    }
}
