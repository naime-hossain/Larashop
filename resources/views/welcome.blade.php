@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    <h1>welcome to Larashop</h1>
    <p>choose wisely</p>
@endsection
@section('content')
    {{-- expr --}}
      <div class="Products_wrap">

            @if ($products->count()>0)
                @foreach ($products as $product)
                
                            <div class="col-sm-4 col-lg-4 col-md-4">
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

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4>Like Our products?
                        </h4>
                        <p>If you like these product, then check out <a target="_blank" href="{{ route('home.products') }}">All products</a> And choose from variety</p>
                        <a class="btn btn-primary" target="_blank" href="{{ route('home.products') }}">All products</a>
                    </div>
            @endif




        </div>

@endsection
  
