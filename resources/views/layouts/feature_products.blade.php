  @foreach ($feature_products as $feature_product)
               
            <div class="col-sm-4 col-lg-4 col-md-4">
              <div class="thumbnail img-raised img-rounded">
              <div class="product_head">
                @if (count($feature_product->photos)>0)
                    @foreach ($feature_product->photos as $photo)
                    @if ($loop->index==0)
                       <img class="img-rounded" src="{{ $photo->thumb() }}" alt="{{ $feature_product->name }}">
                    @endif
                   

                  @endforeach
                  @else
                  {{-- dummy --}}
                  <img class="img-rounded" src="/images/products/{{ $feature_product->name }}" alt="{{ $feature_product->name }}">
                @endif
                  <div class="availability">
                     @if ($feature_product->inStock>5)
                        <span class="label label-success">Available</span>
                      @elseif($feature_product->inStock<5)
                      <span class="label label-warning">Low Stock</span>
                      @elseif($feature_product->inStock==0)
                      <span class="label label-danger">Not Available</span>
                     @endif
                    
                  </div>
                  <div class="cart_button">
                      {{-- <a href="{{ route('cart.edit',$product->id) }}" class="btn btn-primary btn-block">add to cart</a> --}}
          {!! Form::open(['action'=>['CartController@add',$feature_product->id],'method'=>'post','class'=>'']) !!}
         {!! Form::number('qty','1', ['min'=>1,'max'=>$feature_product->inStock,'required']) !!}
          {!! Form::button("add to cart",
           [
           'class'=>'btn btn-primary ',
         
           'type'=>'add to cart'
           ]) !!}
              

        {!! Form::close() !!}
                  </div>
                     <div class="cat_button">
                      @if ($feature_product->category)
                         <a href="{{ route('home.archive',['category',$feature_product->category->name]) }}" class="btn btn-primary cat_btn">{{ $feature_product->category->name }}</a>
                      @endif
                     
                        @if ($feature_product->size)
                           <a href="{{ route('home.archive',['size',$feature_product->size]) }}" class="btn btn-primary size_btn">{{ $feature_product->size }}</a>
                        @endif
                      
                       @if (count($feature_product->types)>0)
                           @foreach ($feature_product->types as $type)
                               <a href="{{ route('home.archive',['type',$type->name]) }}" class="btn btn-primary type_btn">{{ 
                           $type->name
                          }}</a>
                         @endforeach
                       @endif
                     
                     
                  </div>
              </div>
              
                  <div class="caption">
                      <h4 class="pull-right">{{ $feature_product->price }}</h4>
                      <h4><a href="{{ route('home.product',$feature_product->id) }}">{{ $feature_product->name }}</a>
                      </h4>
                    @if ($feature_product->reviews()->count()>0)
                    <div class="ratings">
                      <p class="pull-right">{{ $feature_product->reviews()->count() }} reviews</p>
                      <p>
                      @php
                        $rating=$feature_product->reviews()->sum('rating')/$feature_product->reviews()->count();
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
                      <p>{{ str_limit($feature_product->description,20)  }}</p>
                  </div>
          
              </div>
          </div>
      @endforeach