@extends('layouts.app')
@section('heading')
	<h1>{{ $product->name }}</h1>
@endsection
{{-- end of heading --}}
{{-- extra css for this page only --}}
@section('extra_header')
   <link href="{{ asset('css/zoomple.css') }}" rel="stylesheet" />

@endsection
{{-- end of extra header --}}

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
      {{-- end of breadcrumb --}}

	
       <div class="col-md-9">

       {{-- show the image gallery --}}
           <div class="col-md-7 col-sm-7">

         
           
               @if (count($product->photos)>0)
                 
                 
                    
                  
                 <div id="single_product" class="carousel slide" data-ride="carousel"  data-interval="false">
                     <ol class="carousel-indicators">
                     @foreach ($product->photos as $photo)
                           <li data-target="#single_product" data-slide-to="{{ $loop->index }}" class=""></li>
                    @endforeach
                         
                         
                     </ol>
                     <div class="carousel-inner">
                       @foreach ($product->photos as $photo)
                        <div class="item {{ $loop->index==0?'active':'' }}">
                        
                        

                            <a href="{{  asset($photo->cover()) }}"  class="zoompleFixed">

                           <img class="img-rounded" src="{{  asset($photo->thumb()) }}" alt="{{ $product->name }}">
                            </a>

                        


               {{--   <img class="img-rounded" src="{{  $photo->cover() }}" alt="{{ $product->name }}"> --}}
                             
                         </div>
                         @endforeach
                  
                     </div>
                     <a class="left carousel-control" href="#single_product" data-slide="prev"></a>
                     <a class="right carousel-control" href="#single_product" data-slide="next"></a>
                 </div>
                 {{-- end of single product corusel--}}

               
                @else
                <img class="img-rounded" src="/images/products/{{ $product->name }}" alt="{{ $product->name }}">
            @endif

       
        </div>
        {{-- end og image col-7 --}}
    <div class="col-md-5 col-sm-5">
                                
    <div class=" single_product thumbnail">

          
          <div class="caption">
              <h4 class="pull-right">${{ $product->price }}</h4>
              <h4>{{ $product->name }}
              </h4>

              {{-- show the reviews --}}
               @if ($product->reviews()->count()>0)
                    <div class="ratings">
                      <p class="pull-right">{{ $product->reviews()->count() }} reviews</p>
                      <p>
                    
                      @for ($i =1; $i<=$product->rating; $i++)
                        <span class="glyphicon glyphicon-star"></span>
                      @endfor
                      @php
                      // calculate the rating
                        $rating=$product->reviews()->sum('rating')/$product->reviews()->count();
                      @endphp
                      {{-- check if the rating is float --}}
                       @if (is_float($rating))
                 {{-- show 1/2 star if float --}}
                     <span class="fa fa-star-half-o"></span>
                       @endif
                       {{-- show the overall rating --}}
                       <span class="label label-warning">{{ $product->rating }}</span>
                      </p>
                  </div>
                  @else
                  {{-- if product has no review --}}
                  <p class="label label-default">No review available</p>
                    @endif
      
          </div>
          {{-- end of caption --}}
       
          
                          
           <div class="cart_button">
             {{-- add to cart from --}}
                    {!! Form::open(['action'=>['CartController@add',$product->id],'method'=>'post','class'=>'']) !!}
                   {{-- show the size filed if has size variation --}}
                     @if ($sizes->count()>0)
                       <div class="form-group col-md-12">
                       
                     {!! Form::select('size',$sizes,'', ['placeholder' => 'Pick a size...','class'=>'form-control','required']) !!}
                   </div>
                     @endif

                     {{-- show the color filed if has color variation --}}
                   @if ($colors->count()>0)
                      <div class="form-group col-md-12">
                     
                     {!! Form::select('color',$colors,'', ['placeholder' => 'Pick a color...','class'=>'form-control','required']) !!}
                   </div>
                   @endif
                   {{-- quantity field --}}
                   <div class="form-group col-md-4">
                    {!! Form::label('qty','quantity', ['class'=>'text-info']) !!}
                     {!! Form::number('qty','1', ['min'=>1,'max'=>$product->inStock,'required','class'=>'']) !!}
                     </div>
                     {{-- submit button --}}
                    <div class="form-group col-md-8">
                      {!! Form::button("add to cart",
                       [
                       'class'=>'btn btn-primary ',
                     
                       'type'=>'add to cart'
                       ]) !!}
                       </div>
                          

                    {!! Form::close() !!}
                    {{-- form end --}}
              </div>
              {{-- end of add to cart  --}}


                <div class="cat_button">

                {{-- show category --}}
                  <a href="{{ route('home.archive',['category',$product->category->name]) }}" class="btn btn-primary cat_btn">{{ $product->category->name }}</a>

                  
            {{-- show types --}}
                   @foreach ($product->types as $type)
                         <a href="{{ route('home.archive',['type',$type->name]) }}" class="btn btn-primary type_btn">{{ 
                     $type->name
                    }}</a>
                   @endforeach
                 
              </div>
              {{-- end of cat_button --}}

                <div class="availability">
                {{-- show available badge --}}
                     @if ($product->inStock>5)
                        <span class="label label-success">Available</span>
                        {{-- show low stock badge --}}
                      @elseif($product->inStock<=5)
                      <span class="label label-warning">Low Stock</span>
                      {{-- show not available badge --}}
                      @elseif($product->inStock==0)
                      <span class="label label-danger">Not Available</span>
                     @endif
                     
                    
                  </div>
                  {{-- share link --}}
                  <div class="share_link">
                   <h5>Share this Product on:</h5>
                      {!! Share::currentPage()
                        ->facebook()
                        ->twitter()
                        ->googlePlus()
                        ->linkedin($product->name) !!}
                  </div>
                
                  {{-- end of availability --}}
           </div>
           {{-- end of single product thumbnail --}}
       </div> 
       {{-- end of right col-5 --}}


       {{-- start reviews and description row --}}
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
                 {{-- end of reviews button --}}
                  <li>
                  <a href="#addreviews" data-toggle="tab">
                      
                      Give Review
                    </a>
                 </li>
                 {{-- end of add review button --}}
                   <li>
                  <a href="#description" data-toggle="tab">
                      
                     Product Description
                    </a>
                 </li>
                 {{-- end of descriotion button --}}
                  
                               
                  
                    </ul>
                    {{-- end of nav --}}
                    </div>
                    {{-- end of nav-tabs-wrapper --}}
                  </div>
                  {{-- end of nav-tabs-navigation --}}
                </div>
                {{-- end of tab header --}}
                  <div class="content">
                      <div class="tab-content text-center">
                        <div class="tab-pane active" id="reviews">
                        {{-- list all the reviews and rating --}}
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
                            {{-- if no review  --}}
                         <h3>no review available</h3>
                         @endif

                        </div>
                        {{-- end of all reviews tab --}}
                         <div class="tab-pane" id="addreviews">
                           @if (Auth::check())
                    {{-- if loged in show this from --}}
                      {!! Form::open(['action'=>['ReviewController@store',$product->id],'method'=>'post']) !!}

                          {{-- rating --}}
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


                          {{-- opinion --}}
                         <div class="form-group col-md-12">
                             

                             {!! Form::label('review','Your opinion', []) !!}
                               {!! Form::textarea('review',null,['class'=>'form-control','rows'=>3,'cols'=>5,'required']) !!}

                            </div> 
                            {{-- submit --}}
                        <div class="form-group col-md-12">
                         {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                       </div>
                         

                          {!! Form::close() !!}
                          {{-- end of add review form --}}
                             @else
                             {{-- if not log in --}}
                              <h3>Login in to give review</h3>
                           @endif
                        </div>
                        {{-- end of add review tab --}}


                        {{-- show descrition --}}
                        <div class="tab-pane" id="description">
                          <p>{!! $product->description !!}</p>
                        </div>
                        {{-- end of description tab --}}
             
      
                          
                        </div>
                        {{-- end of tab-content --}}
                      </div>
                      {{-- end of content --}}
                    </div>
                    {{-- end of card --}}
                            
               </div>
<!-- End Tabs with icons on Card -->
             </div>
             {{-- end of review wrap --}}
          </div>
          {{-- end of col --}}
       </div> 
       {{-- end of row --}}


       {{-- show the similar products --}}
    <div class="row">
      <div class="feature_product_wrap">
         
          @if ($similar_products->count()>0)
         <div class="col-md-12">
           <h2>You may also like</h2>
         </div>
               @php
                 $products=$similar_products;
               @endphp
                  @include('layouts.products')
            @endif
      </div>
      {{-- end of feature product wrap --}}
    </div> 
    {{-- end of row --}}
	</div>	
  {{-- end of col-9 --}}

@endsection


{{-- show the sidebar --}}
@section('sidebar')
@include('layouts.sidebar')
 @endsection


{{-- extra footer for this page activte zoomple js --}}
 @section('extra_footer')
   <script src="{{ asset('js/zoomple.js') }}"></script>
   <script src="{{ asset('js/share.js') }}"></script>
   <script type="text/javascript" charset="utf-8" >
     
    $(document).ready(function() {

    $('.zoompleFixed').zoomple({

        blankURL : 'images/blank.gif',

        bgColor : '#90D5D9',

        loaderURL : 'images/loader.gif',

        offset : {x:-150,y:-150},

        zoomWidth : 300, 

        zoomHeight : 300,

        roundedCorners : true

    });

 });


   </script>
 @endsection
 {{-- end of extra footer --}}