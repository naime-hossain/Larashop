@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">General Settings</h1>
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
{!! Form::model($settings,['action'=>['AdminGeneralSettingController@update',$settings->id],'method'=>'put','files' => true]) !!}
  @else
  {!! Form::open(['action'=>'AdminGeneralSettingController@store','method'=>'post','files' => true]) !!}
@endif
 

   <div class="form-group col-md-4 {{ $errors->has('site_name') ? ' has-error' : '' }}">
       {!! Form::label('site_name',' site name', []) !!}
     {!! Form::text('site_name',null, ['class'=>"form-control",'value'=>old('site_name')]) !!}
   </div>
     <div class="form-group col-md-4 {{ $errors->has('site_title') ? ' has-error' : '' }}">
       {!! Form::label('site_title','site title', []) !!}
     {!! Form::text('site_title',null, ['class'=>"form-control",'value'=>old('site_title')]) !!}
   </div>


 

    <div class="form-group col-md-4 {{ $errors->has('site_slogan') ? ' has-error' : '' }}">
       {!! Form::label('site_slogan','product site slogan', []) !!}
     {!! Form::text('site_slogan',null, ['class'=>"form-control",'value'=>old('site_slogan')]) !!}
   </div>





    <div class=" col-md-4">
       {!! Form::label('logo','Select a site Logo', ['class'=>'btn btn-info']) !!}
     {!! Form::file('logo', ['class'=>'form-control']) !!}
   </div>

    <div class=" col-md-4">
       {!! Form::label('cover_pic','Select a site cover pic', ['class'=>'btn btn-info']) !!}
     {!! Form::file('cover_pic', ['class'=>'form-control']) !!}
   </div>




    <div class="form-group col-md-12">
     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}

 </div>
@endsection
