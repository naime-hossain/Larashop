@extends('layouts.app')
@section('heading')
    <h1>  checkout page  </h1>
@endsection
@section('content')
        
      @if ($errors->count()>0)
        @include('alert.error')
        @endif
        
        {!! Form::open(['action'=>'CheckoutController@storePayment','method'=>'post']) !!}
        
            
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  
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