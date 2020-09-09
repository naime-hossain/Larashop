{{-- listed the products --}}
@foreach ($products as $product)

<div class="col-sm-6 col-lg-4 col-md-4">
  <div class="thumbnail img-raised img-rounded">
    <div class="product_head">

      {{-- show the product first image --}}
      @if (count($product->photos)>0)
      @php

      // grab the first photo of the product
      $photo=$product->photos()->first();
      @endphp

      <img class="img-rounded" src="{{ asset($photo->thumb()) }}  " alt="{{ $product->name }}">

      @else
      {{-- dummy --}}
      <img class="img-rounded" src="/images/products/{{ $product->name }}" alt="{{ $product->name }}">
      @endif
      <div class="availability">
        {{-- available badge --}}
        @if ($product->inStock>5)
        <span class="label label-success">Available</span>

        {{-- low stock badge --}}
        @elseif($product->inStock<=5 && $product->inStock>0)
          <span class="label label-warning">Low Stock</span>
          {{-- not available badge --}}
          @elseif($product->inStock==0)
          <span class="label label-danger">Not Available</span>
          @endif

      </div>
      {{-- end of availability div --}}
      @php
      // define first_size
      $first_size='';
      @endphp
      <div class="cat_button">

        {{-- show category --}}
        @if ($product->category)
        <a href="{{ route('home.archive',['category',$product->category->name]) }}"
          class="btn btn-primary cat_btn">{{ $product->category->name }}</a>
        @endif

        {{-- if product has size show this button --}}

        @if ($product->sizes()->count()>0)

        @php
        // grab the first size
        $first_size=$product->sizes()->first()->name;
        @endphp
        <a href="{{ route('home.archive',['size',$first_size]) }}"
          class="btn btn-primary size_btn">{{ $first_size }}</a>


        @endif

        {{-- show the types if has --}}

        @if ($product->types()->count()>0)
        @foreach ($product->types as $type)
        <a href="{{ route('home.archive',['type',$type->name]) }}" class="btn btn-primary type_btn">{{ 
                     $type->name
                    }}</a>
        @endforeach
        @endif


      </div>
      {{-- end of category buttons --}}
      <div class="cart_button">
        {{-- add to cart form --}}
        {!! Form::open(['action'=>['CartController@add',$product->id],'method'=>'post','class'=>'']) !!}
        {{-- quantity field --}}
        {!! Form::number('qty','1', ['min'=>1,'max'=>$product->inStock,'required']) !!}

        {{-- if product has size than show this field --}}
        @if (isset($first_size))
        {!! Form::text('size',$first_size, ['hidden']) !!}
        @endif

        {{-- if product has different color then show this field --}}
        @if ($product->colors()->count()>0)
        {!! Form::text('color',$product->colors()->first()->name, ['hidden']) !!}
        @endif

        {!! Form::button("add to cart",
        [
        'class'=>'btn btn-primary ',

        'type'=>'add to cart'
        ]) !!}


        {!! Form::close() !!}
      </div>
      {{-- end of cart button wrap --}}

    </div>
    {{-- end of product head --}}

    <div class="caption">
      {{-- product price --}}
      <h4 class="pull-right">${{ $product->price }}</h4>

      {{-- product name with single page url --}}
      <h4>
        <a href="{{ route('home.product',$product->slug) }}">{{ $product->name }}</a>
      </h4>

      @if ($product->reviews()->count()>0)
      <div class="ratings">
        {{-- number of reviews --}}
        <p class="pull-right">
          {{ $product->reviews()->count() }} reviews
        </p>

        {{-- show rating --}}
        <p>

          @for ($i =1; $i<=$product->rating; $i++)
            <span class="glyphicon glyphicon-star"></span>
            @endfor
            @php

            // calculate the total rating
            $rating=$product->reviews()->sum('rating')/$product->reviews()->count();

            @endphp
            {{-- show 1/5 star if decimal/float --}}
            @if (is_float($rating))

            <span class="fa fa-star-half-o"></span>
            @endif

            {{-- the overall rating --}}
            <span class="label label-warning">{{ $product->rating }}</span>
        </p>
      </div>
      {{-- end of ratings --}}
      @else
      {{-- show this if now rating available --}}
      <p class="label label-default">No review available</p>
      @endif
      {{--  <p>{!! str_limit($product->description,20)  !!}</p> --}}
    </div>
    {{-- end of caption --}}

  </div>
  {{-- end of thumbnail --}}
</div>
{{-- end of single product col --}}
@endforeach