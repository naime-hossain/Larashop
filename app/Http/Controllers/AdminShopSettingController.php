<?php

namespace App\Http\Controllers;

use App\ShopSetting;
use Illuminate\Http\Request;

class AdminShopSettingController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=ShopSetting::first();
        return view('admin.settings.shop.index',compact('settings'));
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
        'tax'=>'required',
        'currency'=>'required',
        

            ]);

        $input=$request->all();


         // create new settings

         $setting=ShopSetting::create($input);
         return redirect()->back()->with('message','Shop settings created');
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
        $setting=ShopSetting::findOrFail($id);
        $input=$request->all();

 
         // create new settings

         $setting=$setting->update($input);
         return redirect()->back()->with('message','Shop settings updated');
    }
}
