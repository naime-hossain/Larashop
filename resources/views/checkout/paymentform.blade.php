@extends('layouts.app')
@section('heading')
    <h1>  Pymeant and order creation page  </h1>
@endsection
@section('content')
        
      @if ($errors->count()>0)
        @include('alert.error')
        @endif
        
       
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="btn btn-primary" href="{{route('cart.index')}}">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                         
                         @foreach ($cartItems as $item)
                                <div class="col-sm-12">
                                <div class="col-sm-3 col-xs-3">
                                  @php
                                
                                   $product=App\Product::find(1);
                                  @endphp
                                    @if (count($product->photos)>0)
                                        @foreach ($product->photos as $photo)
                                            @if ($loop->index==0)
                                                <img class="img-rounded" src="/images/products/{{  $photo->path }}" alt="{{ $product->name }}">
                                            @endif
                                            
                                        @endforeach
                                            @else
                                            <img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
                                    @endif
                                   
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{$item->id}}</div>
                                    <div class="col-xs-12"><small>Quantity:<span>{{$item->qty}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>$</span>{{$item->price}}</h6>
                                </div>
                            </div>
                               
                         @endforeach
                         
                         <div class="col-sm-12"><hr /></div>
                            <div class="col-sm-12">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>$</span><span>{{ Cart::subtotal() }}</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Tax</small>
                                    <div class="pull-right"><span>{{ Cart::tax() }}</span></div>
                                </div>
                            </div>
                            <div class="col-sm-12"><hr /></div>
                            <div class="col-sm-12">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span>{{ Cart::total() }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                 {!! Form::open(['action'=>'CheckoutController@storePayment','method'=>'post']) !!}
        
            
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                  
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{config('services.stripe.key')}}"
                data-amount="{{Cart::total()*100}}"
                data-name="{{config('app.name')}}"
                data-email="{{Auth::user()->email}}"
                data-description="happy "
                data-image="/images/123.jpg"
                data-locale="auto">
            </script>

                  
                </div>
                
                </form>
@endsection