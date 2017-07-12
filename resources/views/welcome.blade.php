@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    <h1>welcome to Larashop</h1>
    <p>SHOP LIKE THERE’S NO TOMORROW</p>
@endsection
@section('content')
    {{-- expr --}}
      <div class="Products_wrap">
         @if(Session::has('message'))
           @include('alert.success')
           @endif
      <div class="col-md-12">
           <ol class="breadcrumb">
                 
                  <li class="active">Home</li>
              </ol>
              <h2>New Products</h2>
      </div>
             
            @if ($products->count()>0)
                @foreach ($products as $product)
               
                            <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail img-raised img-rounded">
                        <div class="product_head">
                          @if (count($product->photos)>0)
                              @foreach ($product->photos as $photo)
                              @if ($loop->index==0)
                                 <img class="img-rounded" src="/images/products/{{  $photo->path }}" alt="{{ $product->name }}">
                              @endif
                             

                            @endforeach
                            @else
                            <img class="img-rounded" src="/images/products/{{ $product->name }}" alt="{{ $product->name }}">
                          @endif
                            
                            <div class="cart_button">
                                <a href="" class="btn btn-primary btn-block">add to cart</a>
                            </div>
                           <div class="cat_button">
                                <a href="{{ route('home.archive',['category',$product->category->name]) }}" class="btn btn-primary cat_btn">{{ $product->category->name }}</a>

                                 <a href="{{ route('home.archive',['size',$product->size]) }}" class="btn btn-primary size_btn">{{ $product->size }}</a>

                                 @foreach ($product->types as $type)
                                       <a href="{{ route('home.archive',['type',$type->name]) }}" class="btn btn-primary type_btn">{{ 
                                   $type->name
                                  }}</a>
                                 @endforeach
                               
                            </div>
                        </div>
                        
                            <div class="caption">
                                <h4 class="pull-right">{{ $product->price }}</h4>
                                <h4><a href="{{ route('home.product',$product->id) }}">{{ $product->name }}</a>
                                </h4>
                                <p>{{ str_limit($product->description,50)  }}</p>
                            </div>
                          {{--   <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                   <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div> --}}
                        </div>
                    </div>
                @endforeach

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4>Like Our products?
                        </h4>
                        <p>If you like these product, then check out <a target="_blank" href="{{ route('products') }}">All products</a> And choose from variety</p>
                        <a class="btn btn-primary" target="" href="{{ route('products') }}">All products</a>
                    </div>
            @endif




        </div>

@endsection
  
