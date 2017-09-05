<?php

namespace App\Http\Controllers;

use Alert;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
  use Illuminate\Support\Facades\File;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::with('role')->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create a array of all roles with name and id
        $roles=Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

  

    /**
     * Display the specified user.
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
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //create a array of all roles with name and id
        $roles=Role::pluck('name','id')->all();
        $user=User::findOrFail($id);
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified user in storage.
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
            File::delete('images/users/'.$photo->path);
          
              }
           $old_photo=$user->photos()->delete();
          }

          //create new photo
          $file->move('images/users/',$filename);
        
         $photo=$user->photos()->create(['path'=>$filename]);
        
        
        }
        
        if ($user->update($input)) {
            Alert::success('user Info Updated');
            return redirect('/admin/users')->with('message', 'User Info updated  succefully');

        }
    }

    /**
     * Remove the specified user from storage.
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

       

            //delete user  from database
             $user_delete=$user->delete();

        }
        Alert::success('User removed from Database');
        return back()->with('message', 'User  deleted succefully');
    }
}
