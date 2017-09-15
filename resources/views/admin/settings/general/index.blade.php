@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">General Settings</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">


@if ($settings)
{{-- if has setting then show the edit form --}}
{!! Form::model($settings,['action'=>['AdminGeneralSettingController@update',$settings->id],'method'=>'put','files' => true]) !!}
  @else
  {{-- if not show the create from --}}
  {!! Form::open(['action'=>'AdminGeneralSettingController@store','method'=>'post','files' => true]) !!}
@endif
 

{{-- site name --}}
   <div class="form-group col-md-4 {{ $errors->has('site_name') ? ' has-error' : '' }}">
       {!! Form::label('site_name',' site name', []) !!}
     {!! Form::text('site_name',null, ['class'=>"form-control",'value'=>old('site_name')]) !!}
   </div>

   {{-- site title --}}
     <div class="form-group col-md-4 {{ $errors->has('site_title') ? ' has-error' : '' }}">
       {!! Form::label('site_title','site title', []) !!}
     {!! Form::text('site_title',null, ['class'=>"form-control",'value'=>old('site_title')]) !!}
   </div>


 
{{-- site_slogan --}}
    <div class="form-group col-md-4 {{ $errors->has('site_slogan') ? ' has-error' : '' }}">
       {!! Form::label('site_slogan','product site slogan', []) !!}
     {!! Form::text('site_slogan',null, ['class'=>"form-control",'value'=>old('site_slogan')]) !!}
   </div>



{{-- site logo --}}

    <div class=" col-md-4">
       {!! Form::label('logo','Select a site Logo size=190*50', ['class'=>'btn btn-info']) !!}
     {!! Form::file('logo', ['class'=>'form-control']) !!}
   </div>


{{-- site cover pic --}}
    <div class=" col-md-8">
       {!! Form::label('cover_pic','Select a site cover pic', ['class'=>'btn btn-info']) !!}
     {!! Form::file('cover_pic', ['class'=>'form-control']) !!}
   </div>
   {{-- MAIL_DRIVER --}}
   <div class="form-group col-md-4 {{ $errors->has('mail_driver') ? ' has-error' : '' }}">
       {!! Form::label('mail_driver','Mail driver', []) !!}
     {!! Form::text('mail_driver',null, ['class'=>"form-control",'value'=>old('mail_driver')]) !!}
   </div>

    {{-- MAIL_HOST --}}
   <div class="form-group col-md-4 {{ $errors->has('mail_host') ? ' has-error' : '' }}">
       {!! Form::label('mail_host','Mail Host', []) !!}
     {!! Form::text('mail_host',null, ['class'=>"form-control",'value'=>old('mail_host')]) !!}
   </div>

    {{--MAIL_PORT --}}
   <div class="form-group col-md-4 {{ $errors->has('mail_port') ? ' has-error' : '' }}">
       {!! Form::label('mail_port','mail port', []) !!}
     {!! Form::text('mail_port',null, ['class'=>"form-control",'value'=>old('mail_port')]) !!}
   </div>

    {{--MAIL_USERNAME--}}
   <div class="form-group col-md-4 {{ $errors->has('mail_username') ? ' has-error' : '' }}">
       {!! Form::label('mail_username','Mail username', []) !!}
     {!! Form::text('mail_username',null, ['class'=>"form-control",'value'=>old('mail_username')]) !!}
   </div>

    {{-- MAIL_PASSWORD --}}
   <div class="form-group col-md-4 {{ $errors->has('mail_password') ? ' has-error' : '' }}">
       {!! Form::label('mail_password','Mail password', []) !!}
     {!! Form::text('mail_password',null, ['class'=>"form-control",'value'=>old('mail_password')]) !!}
   </div>



   {{-- submit --}}
    <div class="form-group col-md-12">
     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}
 {{-- end of form --}}

 </div>
@endsection
