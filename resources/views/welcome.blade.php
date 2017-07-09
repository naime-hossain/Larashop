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
                {{ $products->index() }}
                            <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$24.99</h4>
                                <h4><a href="{{ route('home.product',$product->id) }}">First Product</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif



                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4>Like Our products?
                        </h4>
                        <p>If you like these product, then check out <a target="_blank" href="{{ route('home.products') }}">All products</a> And choose from variety</p>
                        <a class="btn btn-primary" target="_blank" href="{{ route('home.products') }}">All products</a>
                    </div>

        </div>

@endsection
  
