@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">shop Settings</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">

{{-- if has shop settings show the edit form --}}
@if ($settings)
{!! Form::model($settings,['action'=>['AdminShopSettingController@update',$settings->id],'method'=>'put']) !!}
  @else

  {{-- else show the create form --}}
  {!! Form::open(['action'=>'AdminShopSettingController@store','method'=>'post']) !!}
@endif



{{-- tax field --}}
   <div class="form-group col-md-6 {{ $errors->has('tax') ? ' has-error' : '' }}">
       {!! Form::label('tax','Tax percentage EX: 10 or 1 ', []) !!}
     {!! Form::number('tax',null, ['class'=>"form-control",'value'=>old('tax')]) !!}
   </div>

{{-- currency field --}}
   <div class="form-group col-md-6 {{ $errors->has('currency') ? ' has-error' : '' }}">
       {!! Form::label('currency','what currency you want? such if us dollar then usd', []) !!}
     {!! Form::select('currency',array('usd'=>'Dollar(usa)','cad'=>'Canada  Dollar'  ),null, ['class'=>"form-control",'value'=>old('currency')]) !!}

   </div>


{{-- stripe key --}}
 <div class="form-group col-md-6 {{ $errors->has('stripe_key') ? ' has-error' : '' }}">
       {!! Form::label('stripe_key','what is your stripe publishable key ', []) !!}
     {!! Form::text('stripe_key',null, ['class'=>"form-control",'value'=>old('stripe_key')]) !!}
   </div>


{{-- stripe secret key --}}
    <div class="form-group col-md-6 {{ $errors->has('stripe_secret') ? ' has-error' : '' }}">
       {!! Form::label('stripe_secret','what is your stripe secret key', []) !!}
     {!! Form::text('stripe_secret',null, ['class'=>"form-control",'value'=>old('stripe_secret')]) !!}
   </div>

   {{-- paypal key --}}
 <div class="form-group col-md-6 {{ $errors->has('paypal_client_id') ? ' has-error' : '' }}">
       {!! Form::label('paypal_client_id','what is your paypal client id  ', []) !!}
     {!! Form::text('paypal_client_id',null, ['class'=>"form-control",'value'=>old('paypal_client_id')]) !!}
   </div>


{{-- paypal secret key --}}
    <div class="form-group col-md-6 {{ $errors->has('paypal_secret') ? ' has-error' : '' }}">
       {!! Form::label('paypal_secret','what is your paypal secret key', []) !!}
     {!! Form::text('paypal_secret',null, ['class'=>"form-control",'value'=>old('paypal_secret')]) !!}
   </div>


  


{{-- submit --}}
    <div class="form-group col-md-12">
     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}

 </div>
@endsection
