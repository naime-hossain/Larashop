<?php

namespace App\Http\Controllers;

use Alert;
use App\SocialSetting;
use Illuminate\Http\Request;

class AdminSocialSettingController extends Controller
{
    /**
     * Display a listing of the First social settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=SocialSetting::first();
        return view('admin.settings.social.index',compact('settings'));
    }

    
    /**
     * Store a newly created social settings in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
        'facebook'=>'required',
        'twitter'=>'required',
        'linkedin'=>'required',
        // 'googlePlus'=>'required',
        // 'instagram'=>'required',
        // 'tumblr'=>'required',
        // 'whatsApp'=>'required',
            ]);

        $input=$request->all();

         // create new settings

         $setting=SocialSetting::create($input);
         Alert::success('Social Settings Added');
         return redirect()->back()->with('message','Social settings created');
    }

   
    
    /**
     * Update the specified social settings in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // return $request->all();
        $setting=SocialSetting::findOrFail($id);
        $input=$request->all();



         // Update  settings

         $setting=$setting->update($input);
         Alert::success('Social Settings Updated');
         return redirect()->back()->with('message','Social settings updated');
    }

    
}
