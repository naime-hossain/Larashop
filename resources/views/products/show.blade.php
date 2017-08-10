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
              @if ($product->reviews()->count()>0)
            <div class="ratings">
              <p class="pull-right">{{ $product->reviews()->count() }} reviews</p>
              <p>
              @php
                $rating=$product->reviews()->sum('rating')/$product->reviews()->count();
              @endphp
              @for ($i =1; $i<=$rating; $i++)
                <span class="glyphicon glyphicon-star"></span>
              @endfor
              @if (is_float($rating))
                
                <span class="fa fa-star-half-o"></span>
              @endif
               <span class="label label-warning">{{ $rating }}</span>
              </p>
          </div>
              @else
              <p class="label label-default">No review</p>
                @endif
      
          </div>
       
          
                          
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
                   <li>
                  <a href="#description" data-toggle="tab">
                      
                     Product Description
                    </a>
                 </li>
                  
                               
                  
                    </ul>
                    </div>
                  </div>
                      </div>
                  <div class="content">
                      <div class="tab-content text-center">
                        <div class="tab-pane active" id="reviews">
                         @if ($product->reviews()->count()>0)
                         <ul class="list-group">
                           <li class="list-group-item">
                                   <span class="badge bg-warning">Ratings</span>
                                   Comments
                            </li>
                            @foreach ($product->reviews as $review)
                               
                                 <li class="list-group-item">
                                   <span class="badge label label-warning">{{ $review->rating }}</span>
                                   {{ $review->review }}

                                 </li>
                             
                             
                            @endforeach
                              </ul>
                            @else
                         <h3>no review available</h3>
                         @endif

                        </div>
                         <div class="tab-pane" id="addreviews">
                           @if (Auth::check())
                            {!! Form::open(['action'=>['ReviewController@store',$product->id],'method'=>'post']) !!}
                        <div class="form-group col-md-12">
                          {!! Form::label('rating','Your Rating', []) !!}
                          <div class="stars">
                            <input value="1" type="radio" name="rating" class="star-1" id="star-1" />
                            <label class="star-1" for="star-1">1</label>
                            <input value="2" type="radio" name="rating" class="star-2" id="star-2" />
                            <label class="star-2" for="star-2">2</label>
                            <input value="3" type="radio" name="rating" class="star-3" id="star-3" />
                            <label class="star-3" for="star-3">3</label>
                            <input value="4" type="radio" name="rating" class="star-4" id="star-4" />
                            <label class="star-4" for="star-4">4</label>
                            <input value="5" type="radio" name="rating" class="star-5" id="star-5" />
                            <label class="star-5" for="star-5">5</label>
                            <span></span>
                          </div>
                          </div>
                         <div class="form-group col-md-12">
                             

                             {!! Form::label('review','Your opinion', []) !!}
                               {!! Form::textarea('review',null,['class'=>'form-control','rows'=>3,'cols'=>5,'required']) !!}

                            </div> 
                        <div class="form-group col-md-12">
                         {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                       </div>
                         

                          {!! Form::close() !!}
                             @else
                              <h3>Login in to give review</h3>
                           @endif
                        </div>
                        <div class="tab-pane" id="description">
                          <p>{{ $product->description }}</p>
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