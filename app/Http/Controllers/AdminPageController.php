<?php

namespace App\Http\Controllers;

use Alert;
use App\PageSetting;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
      /**
     * Display a listing of the Page Settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=PageSetting::first();
        return view('admin.settings.page.index',compact('settings'));
    }

 /**
     * Store a newly created Page Settings in storage.
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

        // if contact page is not selected

   if (!$request->contactUs) {
           $input['contactUs']=0;
        }else{
            // return $request->contactUs;
        }

         // create new settings

         $setting=PageSetting::create($input);
         Alert::success('Page Settings Created');
         return redirect()->back()->with('message','Page settings created');
    }

  /**
     * Update the specified Page Settings in storage.
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

         // Update Page settings

         $setting=$setting->update($input);
         Alert::success('Page Settings Updated');
         return redirect()->back()->with('message','Page settings updated');
    }
}
