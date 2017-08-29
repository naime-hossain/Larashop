  @foreach ($products as $product)
               
            <div class="col-sm-4 col-lg-4 col-md-4">
              <div class="thumbnail img-raised img-rounded">
              <div class="product_head">
                @if (count($product->photos)>0)
                 @php
                    $photo=$product->photos()->first();
                 @endphp
                  
                    
                       <img class="img-rounded" src="{{ $photo->thumb() }}" alt="{{ $product->name }}">
                   
                  @else
                  {{-- dummy --}}
                <img class="img-rounded" src="/images/products/{{ $product->name }}" alt="{{ $product->name }}">
                @endif
                  <div class="availability">
                     @if ($product->inStock>5)
                        <span class="label label-success">Available</span>
                      @elseif($product->inStock<=5 && $product->inStock>0)
                      <span class="label label-warning">Low Stock</span>
                      @elseif($product->inStock==0)
                      <span class="label label-danger">Not Available</span>
                     @endif
                    
                  </div>
                  @php
                    // define first_size
                  $first_size='';
                  @endphp
                        <div class="cat_button">
                      @if ($product->category)
                         <a href="{{ route('home.archive',['category',$product->category->name]) }}" class="btn btn-primary cat_btn">{{ $product->category->name }}</a>
                      @endif
                     
                        @if ($product->sizes()->count()>0)
                        
                          @php
                            $first_size=$product->sizes()->first()->name;
                          @endphp
                          <a href="{{ route('home.archive',['size',$first_size]) }}" class="btn btn-primary size_btn">{{ $first_size }}</a>
                      
                           
                        @endif
                      
                       @if ($product->types()->count()>0)
                           @foreach ($product->types as $type)
                               <a href="{{ route('home.archive',['type',$type->name]) }}" class="btn btn-primary type_btn">{{ 
                           $type->name
                          }}</a>
                         @endforeach
                       @endif
                     
                     
                  </div>
                  <div class="cart_button">
                      {{-- <a href="{{ route('cart.edit',$product->id) }}" class="btn btn-primary btn-block">add to cart</a> --}}
          {!! Form::open(['action'=>['CartController@add',$product->id],'method'=>'post','class'=>'']) !!}
         {!! Form::number('qty','1', ['min'=>1,'max'=>$product->inStock,'required']) !!}
         {!! Form::text('size',$first_size, ['hidden']) !!}
         {!! Form::text('color',$product->colors()->first()->name, ['hidden']) !!}
          {!! Form::button("add to cart",
           [
           'class'=>'btn btn-primary ',
         
           'type'=>'add to cart'
           ]) !!}
              

        {!! Form::close() !!}
                  </div>
               
              </div>
              
                  <div class="caption">
                      <h4 class="pull-right">{{ $product->price }}</h4>
                      <h4><a href="{{ route('home.product',$product->slug) }}">{{ $product->name }}</a>
                      </h4>
                    @if ($product->reviews()->count()>0)
                    <div class="ratings">
                      <p class="pull-right">{{ $product->reviews()->count() }} reviews</p>
                      <p>
                    
                      @for ($i =1; $i<=$product->rating; $i++)
                        <span class="glyphicon glyphicon-star"></span>
                      @endfor
                       @if (is_float($product->rating))
                
                     <span class="fa fa-star-half-o"></span>
                       @endif
                       <span class="label label-warning">{{ $product->rating }}</span>
                      </p>
                  </div>
                  @else
                  <p class="label label-default">No review available</p>
                    @endif
                     {{--  <p>{!! str_limit($product->description,20)  !!}</p> --}}
                  </div>
          
              </div>
          </div>
      @endforeach