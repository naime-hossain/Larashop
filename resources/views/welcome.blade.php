@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    <h1>welcome to Larashop</h1>
    <p>SHOP LIKE THERE’S NO TOMORROW</p>
@endsection
@section('content')

    {{-- expr --}}
      <div class="Products_wrap">
        
      <div class="col-md-12">
           <ol class="breadcrumb">
                 
                  <li class="active">Home</li>
              </ol>
              <h2>New Products</h2>
      </div>
             
            @if ($products->count()>0)
                  @include('layouts.products')


                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4>Like Our products?
                        <i class='pe-7s-like'>  </i>
                        </h4>
                        <p>If you like these product, then check out <a target="_blank" href="{{ route('products') }}">All products</a> And choose from variety</p>
                        <a class="btn btn-primary" target="" href="{{ route('products') }}">All products</a>
                    </div>
            @endif




        </div>

@endsection
  
