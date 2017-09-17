@extends('layouts.app')
@section('heading')
	{{--  heading --}}
	<h1 class="text-center text-info">
	Welcome to installation page
	</h1>
@endsection
@section('content')

	 	@if(Session::has('message'))
       @include('alert.success')
       @endif
	 <div class="col-md-8 col-md-offset-2">
		
			 {!! Form::open(['action'=>'InstallController@install','method'=>'post']) !!}
			   <p>Add your database information in .env file then</p>
			 	<p>Click the button for database table setup</p>
			 	<button name='install' type="submit" class="btn btn-primary">install/insert database tables</button>
			{!! Form::close() !!}
	</div>

	@endsection
	 	

