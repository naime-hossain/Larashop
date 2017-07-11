@extends('admin.layouts.admin')
@section('contents')
{{-- @php
	$roles=App\Role::all();
	$single_role=[];

@endphp
 @foreach ($roles as $role) --}}
	{{-- expr --}}
{{-- 	@php
	$single_role[$role->id]=$role->name
	@endphp

@endforeach --}}


  <div class="col-lg-12">
      <h1 class="page-header">Edit user</h1>

  </div>
  <div class="col-md-3">
       @if ($user->photos)
                  
         @foreach ($user->photos as $photo)
            @if ($loop->index==0)
               <img  class="img-rounded" src="/images/users/{{ $photo->path }}" alt="">
            @endif
         

        @endforeach

       @endif
  </div>

 <div class="col-md-8 col-offset-2">
 @if ($errors->count()>0)
  @include('alert.error')
@endif
   @if(Session::has('message'))
        @include('alert.success')
    @endif

 {!! Form::model($user,['action'=>['AdminUsersController@update',$user->id],'method'=>'put','files' => true]) !!}

 <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
     {!! Form::label('name','user name', []) !!}
 	 {!! Form::text('name',null, ['class'=>"form-control",'value'=>old('name')]) !!}
 </div>


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


  <div class="form-group col-md-6">
     {!! Form::label('Role','Select Role for user', []) !!}
 	 {!! Form::select('role_id',$roles,$user->role_id, ['placeholder' => 'Pick a role...','class'=>'form-control']) !!}
 {{-- 	{!! Form::select('size', ['L' => 'Large', 'S' => 'Small'], 'S')!!}
 	{!! Form::select('animal',[
    'Cats' => ['leopard' => 'Leopard'],
    'Dogs' => ['spaniel' => 'Spaniel'],
])!!} --}}
 </div>

 <div class="form-group col-md-6">
     {!! Form::label('Status','Select A status for user', []) !!}
 	 {!! Form::select('is_active',['0'=>'Not Acitve','1'=>'Active'],$user->is_active, ['placeholder' => 'Pick a status...','class'=>'form-control ']) !!}
 </div>


  <div class=" col-md-6">
     {!! Form::label('image','Select a Photo', ['class'=>'btn btn-info']) !!}
 	 {!! Form::file('image', ['class'=>'form-control']) !!}
 </div>


  <div class="form-group col-md-12">
 	 {!! Form::submit('update', ['class'=>'btn btn-primary']) !!}
 </div>
 

 {!! Form::close() !!}

 </div>
@endsection
