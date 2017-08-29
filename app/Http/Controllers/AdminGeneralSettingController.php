<?php

namespace App\Http\Controllers;

use App\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use Config;
class AdminGeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=GeneralSetting::first();
        return view('admin.settings.general.index',compact('settings'));
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
        'site_name'=>'required',
        'site_title'=>'required',
        'site_slogan'=>'required',
        'logo'=>'required|image',
        'cover_pic'=>'required|image',
            ]);

        $input=$request->all();

        //upload the logo and save collect the filename
         if ($request->hasFile('logo')) {
            $file=$request->logo;
             // use intervention image to crop the images
             $filename='logo'.rand(0,time()).$file->getClientOriginalName();
          Image::make($file)->fit(190, 40)->save('images/'.$filename);
          $input['logo']=$filename;
         }
  //upload the cover pic and save collect the filename
           if ($request->hasFile('cover_pic')) {
            $file=$request->cover_pic;
             // use intervention image to crop the images
             $filename='cover_pic'.rand(0,time()).$file->getClientOriginalName();
          Image::make($file)->fit(1100, 500)->save('images/'.$filename);
          $input['cover_pic']=$filename;
         }

         // create new settings

         $setting=GeneralSetting::create($input);
         return redirect()->back()->with('message','general settings created');
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
       
    
        $setting=GeneralSetting::findOrFail($id);
           $input=$request->all();

        //upload the logo and save collect the filename
         if ($request->hasFile('logo')) {
            $file=$request->logo;
            //delete the old pic
            File::delete('images/'.$setting->logo);
             // use intervention image to crop the images
             $filename='logo'.rand(0,time()).$file->getClientOriginalName();
          Image::make($file)->fit(190, 40)->save('images/'.$filename);
          $input['logo']=$filename;
         }
  //upload the cover pic and save collect the filename
           if ($request->hasFile('cover_pic')) {
            $file=$request->cover_pic;
            //delete the old pic
            File::delete('images/'.$setting->logo);
             // use intervention image to crop the images
             $filename='cover_pic'.rand(0,time()).$file->getClientOriginalName();
          Image::make($file)->fit(1100, 500)->save('images/'.$filename);
          $input['cover_pic']=$filename;
         }

         // create new settings

         $setting=$setting->update($input);
         return redirect()->back()->with('message','general settings updated');
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
