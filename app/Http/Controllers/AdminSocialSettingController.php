<?php

namespace App\Http\Controllers;

use App\SocialSetting;
use Illuminate\Http\Request;

class AdminSocialSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=SocialSetting::first();
        return view('admin.settings.social.index',compact('settings'));
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

        // return $request->all();
        $setting=SocialSetting::findOrFail($id);
        $input=$request->all();



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
