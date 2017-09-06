<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
class Admin
{
    /**
     * Handle an incoming request for admin area.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if (Auth::check()) {
          $user=Auth::user();
          if ($user->isadmin() && $user->isactive()) {
             
         # code...
                 return $next($request);
            }else{
                    return redirect('/')->with('message','You are not allowed here Thanks');
                }
        }
            return redirect('/login');
        
       
    }
}
