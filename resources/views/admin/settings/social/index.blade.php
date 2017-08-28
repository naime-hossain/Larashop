@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">social Settings</h1>
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
{!! Form::model($settings,['action'=>['AdminSocialSettingController@update',$settings->id],'method'=>'put','files' => true]) !!}
  @else
  {!! Form::open(['action'=>'AdminSocialSettingController@store','method'=>'post','files' => true]) !!}
@endif
 

   <div class="form-group col-md-4 {{ $errors->has('facebook') ? ' has-error' : '' }}">
       {!! Form::label('facebook','Facebook link', []) !!}
     {!! Form::text('facebook',null, ['class'=>"form-control",'value'=>old('facebook')]) !!}
   </div>

      <div class="form-group col-md-4 {{ $errors->has('twitter') ? ' has-error' : '' }}">
       {!! Form::label('twitter','twitter link', []) !!}
     {!! Form::text('twitter',null, ['class'=>"form-control",'value'=>old('twitter')]) !!}
   </div>

      <div class="form-group col-md-4 {{ $errors->has('linkedin') ? ' has-error' : '' }}">
       {!! Form::label('linkedin','linkedin link', []) !!}
     {!! Form::text('linkedin',null, ['class'=>"form-control",'value'=>old('linkedin')]) !!}
   </div>

      <div class="form-group col-md-4 {{ $errors->has('googlePlus') ? ' has-error' : '' }}">
       {!! Form::label('googlePlus','googlePlus link', []) !!}
     {!! Form::text('googlePlus',null, ['class'=>"form-control",'value'=>old('googlePlus')]) !!}
   </div>

   <div class="form-group col-md-4 {{ $errors->has('instagram') ? ' has-error' : '' }}">
       {!! Form::label('instagram','instagram link', []) !!}
     {!! Form::text('instagram',null, ['class'=>"form-control",'value'=>old('instagram')]) !!}
   </div>
    <div class="form-group col-md-4 {{ $errors->has('tumblr') ? ' has-error' : '' }}">
       {!! Form::label('tumblr','tumbler link', []) !!}
     {!! Form::text('tumblr',null, ['class'=>"form-control",'value'=>old('tumblr')]) !!}
   </div>

      <div class="form-group col-md-4 {{ $errors->has('whatsApp') ? ' has-error' : '' }}">
       {!! Form::label('whatsApp','whatsApp link', []) !!}
     {!! Form::text('whatsApp',null, ['class'=>"form-control",'value'=>old('whatsApp')]) !!}
   </div>
   


 

  








    <div class="form-group col-md-12">
     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}

 </div>
@endsection
