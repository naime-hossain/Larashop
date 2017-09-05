<?php

namespace App\Http\Controllers;

use Alert;
use App\ShopSetting;
use Illuminate\Http\Request;

class AdminShopSettingController extends Controller
{
       /**
     * Display a listing of the shop Settngs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=ShopSetting::first();
        return view('admin.settings.shop.index',compact('settings'));
    }

 /**
     * Store a newly created shop Settngs in storage.
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
         Alert::success('shop settings added');
         return redirect()->back()->with('message','Shop settings created');
    }

  /**
     * Update the specified shop Settngs in storage.
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

 
         // update  settings

         $setting=$setting->update($input);
         Alert::success('Shop settings updated');
         return redirect()->back()->with('message','Shop settings updated');
    }
}
