@extends('admin.layouts.admin')
@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">Dashboard</h1>
  </div>
  <!--End Page Header -->
  </div>

  <div class="row">
  <!-- Welcome -->
  <div class="col-lg-12">
      <div class="alert alert-info">
          <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>{{ Auth::user()->name }} </b>
  
      </div>
  </div>
  <!--end  Welcome -->
  </div>


  <div class="row">
  <!--quick info section -->
  <div class="col-lg-3">
      <div class="alert alert-info text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{ $users }}</h2>
            <p>Users</p>
             <a class="btn btn-info" href="{{ route('users.index') }}" title="">View All Users</a>
      </div>
  </div>

  {{-- products --}}
  <div class="col-lg-3">
      <div class="alert alert-success text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{$products }}</h2>
            <p>products</p>
             <a class="btn btn-success" href="{{ route('products.index') }}" title="">View All products</a>
      </div>
  </div>
    {{-- available products --}}
  <div class="col-lg-3">
      <div class="alert alert-info text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{$available_products }}</h2>
            <p>available products</p>
             <a class="btn btn-info" href="{{ route('products.index','available') }}" title="">View available products</a>
      </div>
  </div>

     {{-- lowStock products --}}
  <div class="col-lg-3">
      <div class="alert alert-warning text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{$lowStock_products }}</h2>
            <p>lowStock products</p>
             <a class="btn btn-warning" href="{{ route('products.index','lowStock') }}" title="">View lowStock products</a>
      </div>
  </div>
   {{-- notAvailable products --}}
  <div class="col-lg-3">
      <div class="alert alert-danger text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{$notAvailable_products }}</h2>
            <p>Not Available Products</p>
             <a class="btn btn-danger" href="{{ route('products.index','notAvailable') }}" title="">View Not Available products</a>
      </div>
  </div>
    {{-- orders --}}
  <div class="col-lg-3">
      <div class="alert alert-info text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{$orders }}</h2>
            <p>orders</p>
             <a class="btn btn-info" href="{{ route('admin.orders') }}" title="">View All orders</a>
      </div>
  </div>
     {{-- delivered orders --}}
  <div class="col-lg-3">
      <div class="alert alert-success text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{$delivered }}</h2>
            <p>delivered orders</p>
             <a class="btn btn-success" href="{{ route('admin.orders','deliver') }}" title="">View All delivered orders</a>
      </div>
  </div>
     {{-- pending orders --}}
  <div class="col-lg-3">
      <div class="alert alert-warning text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{$pending }}</h2>
            <p>pending orders</p>
             <a class="btn btn-warning" href="{{ route('admin.orders','pending') }}" title="">View All pending orders</a>
      </div>
  </div>
         {{-- types --}}
  <div class="col-lg-3">
      <div class="alert alert-info text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{$types }}</h2>
            <p>types </p>
             <a class="btn btn-info" href="{{ route('types.index') }}" title="">View All types</a>
      </div>
  </div>
       {{-- Categories --}}
  <div class="col-lg-3">
      <div class="alert alert-success text-center img-raised img-rounded">
          <i class="fa fa-user fa-3x"></i>&nbsp;<h2 class="text-lead">{{$categories }}</h2>
            <p>categories </p>
             <a class="btn btn-success" href="{{ route('categories.index') }}" title="">View All categories</a>
      </div>
  </div>

 
  <!--end quick info section -->
  </div>

 



@endsection
