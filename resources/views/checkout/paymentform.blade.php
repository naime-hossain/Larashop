@extends('layouts.app')
@section('heading')
    <h1>  Pymeant and order creation page  </h1>
     
@endsection

{{-- end of heading --}}
@section('content')

        
 {{-- list the cart details to review again --}}
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
        <!--REVIEW ORDER-->
        <div class="panel panel-info">
            <div class="panel-heading">
                Review Order <div class="pull-right"><small><a class="btn btn-primary" href="{{route('cart.index')}}">Edit Cart</a></small></div>
            </div>

            {{-- end of panel heading --}}
            <div class="panel-body">
             {{-- list all the cart items --}}
             @foreach ($cartItems as $item)
                    <div class="col-sm-12">
                    {{-- show the product image --}}
                    <div class="col-sm-3 col-xs-3">
                      @php
                        // find the product by cart item id
                       $product=App\Product::find($item->id);
                      @endphp
                        @if (count($product->photos)>0)
                           
                            <img class="img-rounded" src="{{ asset('images/products/'.$product->photos()->first()->path) }}" alt="{{ $product->name }}">
                        @else
                        <img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
                        @endif
                       
                    </div>
                    {{-- end of product img  --}}

                    {{-- show the product name and quantity --}}
                    <div class="col-sm-6 col-xs-6">

                        <div class="col-xs-12">
                          {{$product->name}}
                        </div>
                        <div class="col-xs-12">
                              <small>Quantity:
                                   <span>
                                     {{$item->qty}}
                                   </span>
                            

                             </small>
                      </div>
                    </div>
                    {{-- end of product name and quantity  --}}

                    {{-- show the product price --}}
                    <div class="col-sm-3 col-xs-3 text-right">
                        <h6><span>$</span>{{$item->price}}</h6>

                    </div>
                </div>
                {{-- end of product details col --}}
                   
             @endforeach
             

             {{-- show the total price with tax --}}
             <div class="col-sm-12"><hr /></div>
                <div class="col-sm-12">
                    <div class="col-xs-12">
                        <strong>Subtotal</strong>
                        <div class="pull-right"><span>$</span><span>{{ Cart::subtotal() }}</span></div>
                    </div>
                    {{-- end of subtotal --}}
                    <div class="col-xs-12">
                        <small>Tax</small>
                        <div class="pull-right"><span>{{ Cart::tax() }}</span></div>
                    </div>
                    {{-- end of tax --}}
                </div>
                <div class="col-sm-12"><hr /></div>
                <div class="col-sm-12">
                    <div class="col-xs-12">
                        <strong>Order Total</strong>
                        <div class="pull-right"><span>$</span><span>{{ Cart::total() }}</span></div>
                    </div>
                </div>
                {{-- end of total --}}
            </div>
            {{-- end of panel body --}}
        </div>
        {{-- end of panel --}}
        
    </div>
              
<!--REVIEW ORDER END-->
       

{{-- show the forms for paymant--}}
 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
    {!! Form::open(['action'=>'CheckoutController@storePayment','method'=>'post']) !!}   
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{config('services.stripe.key')}}"
                data-amount="{{Cart::total()*100}}"
                data-currency="{{ App\ShopSetting::first()?App\ShopSetting::first()->currency:'usd' }}"
                data-name="{{config('app.name')}}"
                data-email="{{Auth::user()->email}}"
                data-description="happy "
                data-image="/images/123.jpg"
                data-locale="auto">
            </script>



   {!! Form::close() !!}
                  
      </div>
      {{-- end of stripe paymant --}}
        

        {{-- paypal button --}}
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
          
        {!! Form::open(['action'=>'PaypalController@postPaymentWithpaypal','method'=>'post']) !!}

      
      
                        
                       
            {!! Form::submit('pay With Paypal', ['class'=>'btn btn-primary']) !!}
                        
               
            {!! Form::close() !!}
        </div>

        {{-- end of paypal payment --}}
@endsection