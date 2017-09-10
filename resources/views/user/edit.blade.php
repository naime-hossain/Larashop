@extends('layouts.app')
@section('content')

  <div class="col-lg-12">
      <h1 class="page-header">Edit profile</h1>

  </div>
  {{-- end of col-12 --}}


{{-- display the profile photo if has --}}
  <div class="col-md-3">
       @if ($user->photos->count()>0)
       
               <img  class="img-rounded" src="{{ asset('images/users/'. $user->photos()->first()->path) }}" alt="">
       

       @endif
  </div>
  {{-- end of col-3 --}}


{{-- display the user info --}}
 <div class="col-md-8 col-offset-2">

{{-- form  to edit user info --}}
 {!! Form::model($user,['action'=>['UserController@update',$user->id],'method'=>'put','files' => true]) !!}

 {{-- name --}}

 <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
     {!! Form::label('name','user name', []) !!}
   {!! Form::text('name',null, ['class'=>"form-control",'value'=>old('name')]) !!}
 </div>

{{-- email --}}
  <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
     {!! Form::label('email','user email', []) !!}
   {!! Form::email('email',null,['class'=>'form-control','value'=>old('email')]) !!}
 </div>


{{--   <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
     {!! Form::label('password',' user password', []) !!}
   {!! Form::password('password', ['class'=>'form-control']) !!}

 </div>


  <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
     {!! Form::label('password','confirm password', []) !!}
   {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
 </div> --}}



{{-- photo --}}
  <div class=" col-md-6">
     {!! Form::label('image','Select a Photo', ['class'=>'btn btn-info']) !!}
   {!! Form::file('image', ['class'=>'form-control']) !!}
 </div>

{{-- submit --}}
  <div class="form-group col-md-12">
   {!! Form::submit('update', ['class'=>'btn btn-primary']) !!}
 </div>
 

 {!! Form::close() !!}
 {{-- end of form --}}

 </div>
 {{-- end of col-8 --}}
@endsection
