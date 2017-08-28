@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">shop Settings</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
 @if ($errors->count()>0)
  @include('alert.error')
@endif
   @if(Session::has('message'))
        @include('alert.success')
    @endif

@if ($settings)
{!! Form::model($settings,['action'=>['AdminShopSettingController@update',$settings->id],'method'=>'put']) !!}
  @else
  {!! Form::open(['action'=>'AdminShopSettingController@store','method'=>'post']) !!}
@endif




   <div class="form-group col-md-6 {{ $errors->has('tax') ? ' has-error' : '' }}">
       {!! Form::label('tax','Tax percentage EX: 10 or 1 ', []) !!}
     {!! Form::number('tax',null, ['class'=>"form-control",'value'=>old('tax')]) !!}
   </div>


   <div class="form-group col-md-6 {{ $errors->has('currency') ? ' has-error' : '' }}">
       {!! Form::label('currency','what currency you want? such if us dollar then usd', []) !!}
     {!! Form::text('currency',null, ['class'=>"form-control",'value'=>old('currency')]) !!}
   </div>

 <div class="form-group col-md-6 {{ $errors->has('stripe_key') ? ' has-error' : '' }}">
       {!! Form::label('stripe_key','what is your stripe publishable key ', []) !!}
     {!! Form::text('stripe_key',null, ['class'=>"form-control",'value'=>old('stripe_key')]) !!}
   </div>

    <div class="form-group col-md-6 {{ $errors->has('stripe_secret') ? ' has-error' : '' }}">
       {!! Form::label('stripe_secret','what is your stripe secret key', []) !!}
     {!! Form::text('stripe_secret',null, ['class'=>"form-control",'value'=>old('stripe_secret')]) !!}
   </div>

  



    <div class="form-group col-md-12">
     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}

 </div>
@endsection