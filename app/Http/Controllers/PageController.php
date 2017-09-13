<?php

namespace App\Http\Controllers;

use Alert;
use App\Message;
use App\PageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display contact us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
       return view('page.contact');
    }


    /**
     * send message to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function message(Request $request)
    {
       $this->validate($request,[
         'name'=>'required',
         'email'=>'required',
         'subject'=>'required',
         'message'=>'required',
        ]);
       $user=Auth::user();
      
       $input=$request->all();
        if ($user) {
          $input['user_id']=$user->id;
       }

       $message=Message::create($input);
         Alert::success('Good job! Message recieved')->autoclose(1000);
       return redirect('/')->with('message','Good job! Message recieved');
    }

      /**
     * Display return policy page.
     *
     * @return \Illuminate\Http\Response
     */
    public function returnPolicy()
    {

        $returnPolicy=PageSetting::first()->returnPolicy;
       return view('page.return',compact('returnPolicy'));
    }
        /**
     * Display termsAndConditions page.
     *
     * @return \Illuminate\Http\Response
     */
    public function termsAndConditions()
    {

        $termsAndConditions=PageSetting::first()->termsAndConditions;
       return view('page.terms',compact('termsAndConditions'));
    }


    
}
