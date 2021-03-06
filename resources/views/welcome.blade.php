@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    @if ($GeneralSetting)
      <h1>{{ $GeneralSetting->site_title }}</h1>
    <p>{{ $GeneralSetting->site_slogan }}</p>
    @else
    <h1>welcome to Larashop</h1>
    <p>shop like there is no tommorow</p>
    @endif
    
    
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
          @if (isset($products))
             @if ($products->count()>0)
                  @include('layouts.products')

            @endif
          @endif
          


    
      <div class="feature_product_wrap">
        @if (isset($feature_products))
            @if ($feature_products->count()>0)
          <div class="col-md-12">
           <h2>Our Feature Products</h2>
         </div>
                 @php
                   $products=$feature_products;
                 @endphp
              @include('layouts.products')

               
              
          @endif
        @endif
         
      </div>
    
    
      <div class="feature_product_wrap">
         @if (isset($feature_products))
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
                        <p>If you like these product, then check out <a target="_blank" href="{{ route('products') }}">All products</a> And choose from variety</p>
                        <a class="btn btn-primary" target="" href="{{ route('products') }}">All products</a>
                    </div>
            @endif
        @endif
    
      </div>
  

        </div>

@endsection
  
