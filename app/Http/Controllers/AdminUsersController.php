<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
  use Illuminate\Support\Facades\File;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
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
        $this->validate($request,[
            'name'=>'required|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
            'role_id'=>'required',
            'image'=>'required|image',
            ]);

        $input=$request->all();
        if ($file=$request->file('image')) {
            # code...
             $filename= rand(0,time()).$file->getClientOriginalName();
             $file->move('images/users',$filename);
              $photo=Photo::create(['image'=>$filename]);
              $input['photo_id']=$photo->id;
        }

        

        $input['password']=bcrypt($request->password);
        
        $user=User::create($input);
   if ($user) {
       # code...
    return redirect('/admin/users')->with('message', 'User  added succefully');
   }else{
     return back()->with('message', 'User not added succefully');
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
        $user=User::findOrFail($id);
        return view('admin.users.profile',compact('user'));
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
        $roles=Role::pluck('name','id')->all();
        $user=User::findOrFail($id);
        return view('admin.users.edit',compact('user','roles'));
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
        $input=$request->except(['image']);
       

        if ($file=$request->file('image')) {
          
      
       
       $filename = rand(0,time()).$file->getClientOriginalName();
       //remove old history
          if ($user->photos) {
              foreach ($user->photos as $photo) {
            File::delete('images/users/'.$user->photo->path);
          
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
            return redirect('/admin/users')->with('message', 'User Info updated  succefully');

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
        $user=User::findOrFail($id);
       
        if ($user) {
           //remove user photo
             if ($user->photos) {
              foreach ($user->photos as $photo) {
            File::delete('images/users/'.$photo->path);
          
              }
           $old_photo=$user->photos()->delete();
          }

       

            //delete users Posts from database
             $user_delete=$user->delete();

        }
        return back()->with('message', 'User  deleted succefully');
    }
}
