@extends('layouts.app')
@section('heading')
	<h1>single Products</h1>
@endsection
@section('content')
	<div class="col-md-7">

         <div class="">
           
               @if (count($product->photos)>0)
                 
                 
                    
                  
                 <div id="single_product" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                     @foreach ($product->photos as $photo)
                           <li data-target="#single_product" data-slide-to="{{ $loop->index }}" class=""></li>
                    @endforeach
                         
                         
                     </ol>
                     <div class="carousel-inner">
                       @foreach ($product->photos as $photo)
                         <div class="item {{ $loop->index==0?'active':'' }}">
                             <img class="img-rounded" src="/images/products/{{  $photo->path }}" alt="{{ $product->name }}">
                         </div>
                         @endforeach
                  
                     </div>
                     <a class="left carousel-control" href="#single_product" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                     <a class="right carousel-control" href="#single_product" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                 </div>

               
                @else
                <img class="img-rounded" src="/images/products/{{ $product->name }}" alt="{{ $product->name }}">
            @endif

         </div>
        </div>
    <div class="col-md-5">
                                
            <div class=" single_product thumbnail">

            
            <div class="caption">
                <h4 class="pull-right">{{ $product->price }}</h4>
                <h4><a href="{{ route('home.product',$product->id) }}">{{ $product->name }}</a>
                </h4>
                <p>{{ $product->description }}</p>
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
            
                            
                             <div class="cart_button">
                                <a href="" class="btn btn-primary btn-block">add to cart</a>
                            </div>
                                 <div class="cat_button">
                                <a href="" class="btn btn-primary cat_btn">{{ $product->category->name }}</a>
                                 <a href="" class="btn btn-primary size_btn">{{ $product->size }}</a>
                                 @foreach ($product->types as $type)
                                       <a href="" class="btn btn-primary type_btn">{{ 
                                   $type->name
                                  }}</a>
                                 @endforeach
                               
                            </div>
        </div>
                    
	</div>	

@endsection