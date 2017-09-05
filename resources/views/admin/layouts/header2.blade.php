<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Core CSS - Include with every page -->
    <link href="/css/app.css" rel="stylesheet" />
    <link href="/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/css/font-awesome.min.css" rel="stylesheet" />
    {{-- asset for sweetalert --}}
<link href="/css/sweetalert.css" rel="stylesheet"/>
     <script src="/js/sweetalert.min.js"></script>
    <!-- Page-Level CSS -->
      <!-- Theme style -->
  <link rel="stylesheet" href="/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="/css/skin-blue.min.css">
    <link href="/css/material-kit.css" rel="stylesheet"/>
    <link href="/admin_assets/css/admin.css" rel="stylesheet" />
    
   </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{str_limit(config('app.name'),3)}}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{ config('app.name') }}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              @if (Auth::user()->photos()->count()>0)
                 <img src="/images/users/{{ Auth::user()->photos()->first()->path }}" class="user-image" alt="User Image">
                   @else
                 <img src="/images/users/admin.png" class="user-image img-circle" alt="User Image">
              @endif
              
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                @if (Auth::user()->photos()->count()>0)
                 <img src="/images/users/{{ Auth::user()->photos()->first()->path }}" class="img-circle" alt="User Image">
                   @else
                 <img src="/images/users/admin.png" class="img-circle" alt="User Image">
              @endif

                <p>
                  {{ Auth::user()->name }}
                  
                </p>
              </li>
              
         
              <!-- Menu Footer-->
              <li class="user-footer">
               

                 <a href="{{ route('users.show', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i>User Profile</a>
                       
                       <a href="{{ route('users.edit', Auth::user()->id) }}"><i class="fa fa-gear  fa-fw"></i>Settings</a>
                        
                       
                        <a href=" {{ route('logout') }}"
                        onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"
                        >
                        <i class="fa fa-sign-out fa-fw"></i>
                        Logout
                        </a>
                       
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}
                            </form>
                      
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
             @if (Auth::user()->photos()->count()>0)
                 <img src="/images/users/{{ Auth::user()->photos()->first()->path }}" class="user-image img-circle" alt="User Image">
                 @else
                 <img src="/images/users/admin.png" class="user-image img-circle" alt="User Image">

              @endif
 
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

   

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">All You need</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashborad</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('users.index')}}">All Users</a></li>
            
          </ul>
        </li>
        {{-- products menu link --}}
           <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Products</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i>All Products</a></li>
            <li>
                <a href="{{ route('products.create') }}"><i class="fa fa-circle-o"></i>add new product</a>
            </li>
            
          </ul>
        </li>

        {{-- categories link --}}
             <li class="treeview">
          <a href="#"><i class="fa fa-table"></i> <span>Categories</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i>all categories</a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i>add new category</a>
            </li>
            
          </ul>
        </li>
          {{-- types link --}}
             <li class="treeview">
          <a href="#"><i class="fa fa-th"></i> <span>Types</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="{{ route('types.index') }}"><i class="fa fa-circle-o"></i>all type</a>
            </li>
            <li>
                <a href="{{ route('types.index') }}"><i class="fa fa-circle-o"></i>add new type</a>
            </li>
            
          </ul>
        </li>
            {{-- orders link --}}
             <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>Orders</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
             <li>
                <a href="{{ route('admin.orders') }}"><i class="fa fa-circle-o"></i>all Orders</a>
            </li>
            <li>
                <a href="{{ route('admin.orders','pending') }}"><i class="fa fa-circle-o"></i>Pending orders</a>
            </li>
             <li>
                <a href="{{ route('admin.orders','deliver') }}"><i class="fa fa-circle-o"></i>Delivered orders</a>
            </li>
            
          </ul>
        </li>
        {{-- message --}}
           <li>
          <a href="{{ route('message.index') }}">
            <i class="fa fa-envelope"></i> <span>messages</span>
       
          </a>
        </li>
             {{-- app settings link --}}
             <li class="treeview">
          <a href="#"><i class="fa fa-gears"></i> <span>App settings</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="{{ route('general.index') }}"><i class="fa fa-circle-o"></i>Genegral Setting</a>
            </li>
            <li>
                <a href="{{ route('social.index') }}"><i class="fa fa-circle-o"></i>Social Setting</a>
            </li>
             <li>
                <a href="{{ route('page.index') }}"><i class="fa fa-circle-o"></i>Page Setting</a>
            </li>
             <li>
                <a href="{{ route('shop.index') }}"><i class="fa fa-circle-o"></i>Shop Setting</a>
            </li>
            
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>