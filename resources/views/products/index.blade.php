@extends('layouts.app')
@section('heading')
	<h1>All Of Our Products</h1>
@endsection
@section('content')
  <div class="col-md-12">
          <ol class="breadcrumb">
              <li>
                  <a href="/">Home</a>
              </li>
              
              <li class="active">{{ Route::currentRouteName() }}</li>
          </ol>
      </div>
	<div class="col-md-9 all_products products_wrap">
		  

            @if ($products->count()>0)
                @foreach ($products as $product)
                
                    <div class="col-sm-6 col-lg-4 col-md-4">
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
                        {{--     <div class="ratings">
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
                <div class="col-md-12">
                  {{ $products->links() }}
                </div> 
                
            @endif




        </div>
	
@endsection
@section('sidebar')
@include('layouts.sidebar')
 @endsection
 {{-- @section('script')
  <script  type="text/javascript">
$(document).ready(function(){
$(document).on('click','.pagination a', function (e) {
  e.preventDefault();
  var url=$(this).attr('href');
  var pageNbr=url.split('page=')[1];

$.get(url,function(data){
   $('.all_products').html(data);
   location.hash=pageNbr;
})
});

});


</script>
 @endsection --}}
