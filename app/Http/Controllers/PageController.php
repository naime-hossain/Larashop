<?php

namespace App\Http\Controllers;

use App\PageSetting;
use Illuminate\Http\Request;

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
