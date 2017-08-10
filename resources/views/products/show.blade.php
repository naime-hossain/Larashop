@extends('layouts.app')
@section('heading')
	<h1>single Product</h1>
@endsection
@section('content')
 <div class="col-md-12">
          <ol class="breadcrumb">
              <li>
                  <a href="/">Home</a>
              </li>
              <li>
                  <a href="{{ url()->previous() }}">{{ str_replace(route('home').'/','', url()->previous()) }}</a>
              </li>
              <li class="active">{{ $product?$product->name:'' }}</li>
          </ol>
      </div>
	
       <div class="col-md-9">
           <div class="col-md-7 col-sm-7">

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
                             <img class="img-rounded" src="{{  $photo->cover() }}" alt="{{ $product->name }}">
                         </div>
                         @endforeach
                  
                     </div>
                     <a class="left carousel-control" href="#single_product" data-slide="prev"></a>
                     <a class="right carousel-control" href="#single_product" data-slide="next"></a>
                 </div>

               
                @else
                <img class="img-rounded" src="/images/products/{{ $product->name }}" alt="{{ $product->name }}">
            @endif

         </div>
        </div>
    <div class="col-md-5 col-sm-5">
                                
    <div class=" single_product thumbnail">

          
          <div class="caption">
              <h4 class="pull-right">{{ $product->price }}</h4>
              <h4>{{ $product->name }}
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
                  <a href="{{ route('cart.edit',$product->id) }}" class="btn btn-primary btn-block">add to cart</a>
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
       </div> 
   <div class="row">
      <div class="col-md-12">
         <div class="review_wrap">
            <div class="section section-tabs">

              
        <!-- Tabs with icons on Card -->
        <div class="card card-nav-tabs">
          <div class="header header-success">
           
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="active">
                  <a href="#reviews" data-toggle="tab">
                      
                      Reviews
                    </a>
                 </li>
                  <li>
                  <a href="#addreviews" data-toggle="tab">
                      
                      Give Review
                    </a>
                 </li>
                  
                               
                  
                    </ul>
                    </div>
                  </div>
                      </div>
                  <div class="content">
                      <div class="tab-content text-center">
                        <div class="tab-pane active" id="reviews">
                         reviews
                        </div>
                         <div class="tab-pane" id="addreviews">
                          {!! Form::open(['action'=>['ReviewController@store',$product->id],'method'=>'post']) !!}
                         <div class="form-group col-md-6">
                             {!! Form::label('review','Your opinion', []) !!}
                               {!! Form::text('review',null,['class'=>'form-control']) !!}
                                <div class="form-group col-md-12">
                         {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                       </div>
                         </div>

                          {!! Form::close() !!}
                        </div>
             
      
                          
                        </div>
                      </div>
                    </div>
                            
               </div>
<!-- End Tabs with icons on Card -->
             </div>
          </div>
       </div>            
	</div>	

@endsection
@section('sidebar')
@include('layouts.sidebar')
 @endsection