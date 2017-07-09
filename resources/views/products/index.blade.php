@extends('layouts.app')
@section('heading')
	<h1>All Of Our Products</h1>
@endsection
@section('content')
	<div class="col-md-8">
		   <div class="Products_wrap">

            @if ($products->count()>0)
                @foreach ($products as $product)
                
                            <div class="col-sm-6 col-lg-6 col-md-6">
                        <div class="thumbnail">
                          @foreach ($product->photos as $photo)
                             <img src="/images/products/{{ $photo->path }}" alt="">
                          @endforeach
                            
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

            @endif




        </div>
	</div>	
@endsection