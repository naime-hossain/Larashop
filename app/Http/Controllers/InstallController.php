<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;


class InstallController extends Controller
{
    public function index(){
  
      $tables_exists= DB::select('SHOW TABLES');
  //check if installation is previously done or not
      if ($tables_exists) {
      	return redirect('/')->with('message','database table already created');
      }
    	return view('install.index');
    }


    public function install(){
    	
    	//migrate all the tables via Artisan call
    	Artisan::call('migrate');
    	return redirect('/')->with('message','database table created');
    	}
}
