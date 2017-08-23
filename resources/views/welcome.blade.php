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
                        
                        </h4>
                        <p>If you like these product, then check out <a target="_blank" href="{{ route('products') }}">All products</a> And choose from variety</p>
                        <a class="btn btn-primary" target="" href="{{ route('products') }}">All products</a>
                    </div>
            @endif


    <div class="row">
      <div class="feature_product_wrap">
        
          @if ($feature_products->count()>0)
 <div class="col-md-12">
           <h2>Our Feature Products</h2>
         </div>
                     @php
                       $products=$feature_products;
                     @endphp
                  @include('layouts.products')

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4>Like Our products?
                         
                        </h4>
                        <p>If you like these product, then check out <a target="_blank" href="{{ route('products') }}">All feature products</a> And choose from variety</p>
                        <a class="btn btn-primary" target="" href="{{ route('products') }}">All products</a>
                    </div>
              
            @endif
      </div>
    </div>
      <div class="row">
      <div class="feature_product_wrap">
        
          @if ($popular_products->count()>0)
     <div class="col-md-12">
           <h2>Our Popular Products</h2>
         </div>
                     @php
                       $products=$popular_products;
                     @endphp
                  @include('layouts.products')

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4>Like Our products?
                         
                        </h4>
                        <p>If you like these product, then check out <a target="_blank" href="{{ route('products') }}">All feature products</a> And choose from variety</p>
                        <a class="btn btn-primary" target="" href="{{ route('products') }}">All products</a>
                    </div>
              
            @endif
      </div>
    </div>

        </div>

@endsection
  
