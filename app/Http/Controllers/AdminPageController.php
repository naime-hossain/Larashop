<?php

namespace App\Http\Controllers;

use App\PageSetting;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=PageSetting::first();
        return view('admin.settings.page.index',compact('settings'));
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
        'contactUs'=>'required',
        'termsAndConditions'=>'required',
        'returnPolicy'=>'required',

            ]);

        $input=$request->all();

   if (!$request->contactUs) {
           $input['contactUs']=0;
        }else{
            // return $request->contactUs;
        }

         // create new settings

         $setting=PageSetting::create($input);
         return redirect()->back()->with('message','general settings created');
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

        // return $request->all();
        $setting=PageSetting::findOrFail($id);
        $input=$request->all();

   if (!$request->contactUs) {
           $input['contactUs']=0;
        }else{
            // return $request->contactUs;
        }

         // create new settings

         $setting=$setting->update($input);
         return redirect()->back()->with('message','general settings updated');
    }
}
