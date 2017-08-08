<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function order()
    {
        $user=Auth::user();
        $orders=$user->orders()->with('products','address')->get();
        return view('user.order',compact('orders'));
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
    public function edit($name)
    {
        // $roles=Role::pluck('name','id')->all();
         $user=User::with('photos')->whereName($name)->first();
         $auth_user=Auth::user();
        // return $user->name;
       if ($user) {
             
        if ($auth_user->id==$user->id) {
            return view('user.edit',compact('user','roles'));
        }else{
            return redirect(route('user.edit',[$auth_user->name]));
        }
       }
       return redirect(route('user.edit',[$auth_user->name]));
        
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
           $this->validate($request,[
            'image'=>'image',
            ]);
        $user=User::findOrFail($id);
        $input=$request->except(['image','role_id','is_active']);
       

        if ($file=$request->file('image')) {
          
      
       
       $filename = rand(0,time()).$file->getClientOriginalName();
       //remove old history
          if ($user->photos) {
              foreach ($user->photos as $photo) {
            File::delete('images/users/'.$photo->path);
          
              }
           $old_photo=$user->photos()->delete();
          }

          //create new photo
          $file->move('images/users/',$filename);
        
         $photo=$user->photos()->create(['path'=>$filename]);
        
        
        }
        $user->update($input);
        if ($user) {
            # code...
            return back()->with('message', 'User Info updated  succefully');

        }
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
