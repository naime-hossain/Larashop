<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{-- favicon  --}}
<link rel="icon" href="{{ asset('images/cart.png') }}" type="image" sizes="16x16">
    <title>{{ config('app.name', 'Larashop') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--     <link href="/css/font-awesome.min.css" rel="stylesheet" />
<link href="/css/material-kit.css" rel="stylesheet"/>
<link href="/css/sweetalert.css" rel="stylesheet"/> --}}
     <script src="  {{ asset('js/sweetalert.min.js') }}"></script>
@yield('extra_header')
   {{--  <link href="/css/style.css" rel="stylesheet"/> --}}
</head>
<body>
 <div id="preloader">
    <div id="status">
        &nbsp;
    </div>
</div>
{{-- end of preloader --}}
<div id="app">
<nav class="navbar navbar-default navbar-static-top ">
    <div class="container">
     <div>
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand fa fa-3x" href="{{ url('/') }}">
            {{-- if has logo show it otherwise the app name --}}
            @if (isset($GeneralSetting) && $GeneralSetting)
                  @if ($GeneralSetting->logo)
                <img src="{{ asset('images/'.$GeneralSetting->logo) }}" alt="">
                @else
                 {{ config('app.name', $GeneralSetting->site_name) }}
                @endif

                @else
                {{ config('app.name') }}

            @endif
         
               
               
            </a>
        </div>
        {{-- end of nav header --}}

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            {{-- get the current url --}}
                     @php
                        $url=url()->current();
                     @endphp
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!--home -->
                 <li class="{{ $url==route('home')?'active':'' }}">
                    <a href="{{route('home')}}" title="">home</a>
                </li>
                {{-- products --}}
                <li class="{{ $url==route('products')?'active':'' }}">
                 <a href="{{route('products')}}" title="">products</a>

                 {{-- if user loged in show thisese link --}}
                 </li>
                @if (Auth::check())
                 <li class="dropdown {{ $url==route('user.edit',Auth::user()->name)?'active':'' }}">
                  {{-- user name --}}
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                         {{-- profile link --}}
                         <li>
                          <a href="{{ route('user.edit',Auth::user()->name) }}" title="">Profile</a>
                         </li>
                         
                         {{-- order lists --}}
                         <li>
                         <a href="{{ route('order') }}" title="">Orders</a>
                         </li>
                         {{-- logout link --}}
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                          {{-- logout form --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                     </li>
                 </ul>
                </li>
                   {{-- user link end --}}


                 
                        
                 

               {{-- if user not log in show these link --}}
                @else
                {{-- log in link --}}
                <li class="{{ $url==route('login')?'active':'' }}">
                  <a href="{{ route('login') }}">Login</a>
                </li>
              {{-- register link --}}
                <li class="{{ $url==route('register')?'active':'' }}">
                <a href="{{ route('register') }}">Register</a>
                </li>
                
                @endif
               
                {{-- cart page link --}}
                 <li class="cart_menu_item">
                 <a href="{{ route('cart.index') }}"> 
                   <i class="fa fa-shopping-cart"></i> Cart
                   <span class="btn btn-primary btn-fab btn-fab-mini btn-round">{{ Cart::count() }}</span>
                   </a>
                </li>


            </ul>
            {{-- end of unorder list --}}
      
    
            </div>
            {{-- end navbar-collapse --}}
        </div>
        {{-- end of row --}}
    </div>
    {{-- end of container --}}
  </nav>
  {{-- end of nav --}}
</div>
        {{-- end app --}}