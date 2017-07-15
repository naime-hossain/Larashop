<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
 use Illuminate\Support\Facades\Session;
 use Illuminate\Support\Facades\URL;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
         // Session::set('backUrl', URL::previous());
         // session( ['backUrl'=>URL::previous()]);
    }
    // public function redirectTo(){
    //     return redirect()->intended();
    // }
//     public function redirectTo()
// {
//     return session('backUrl') ? session('backUrl') :   $this->redirectTo;
// }
        
}
// public function __construct()
// {
//     $this->middleware('guest', ['except' => 'logout']);
//     Session::set('backUrl', URL::previous());
// }


// public function redirectTo()
// {
//     return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
// }