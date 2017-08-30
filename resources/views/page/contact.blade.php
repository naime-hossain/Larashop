@extends('layouts.app')
@section('heading')
	<h1>contact us</h1>
  
@endsection
@section('content')
  <div class="col-md-8">
  	 {!! Form::open(['action'=>'PageController@message','method'=>'post']) !!}
  	 	<legend>Let us know any query</legend>
  	 
  	 	<div class="form-group col-md-6">
  	 		{!! Form::label('name','Your Name', []) !!}
  	 		{!! Form::text('name',null, ['class'=>'form-control','required']) !!}
  	 	</div>
  	 	<div class="form-group col-md-6">
  	 		{!! Form::label('email','Your email', []) !!}
  	 		{!! Form::text('email',null, ['class'=>'form-control','required']) !!}
  	 	</div>
  	 	 	<div class="form-group col-md-12">
  	 		{!! Form::label('message','Your message', []) !!}
  	 		{!! Form::textarea('message',null, ['class'=>'form-control','required','rows'=>10]) !!}
  	 	</div>
  	 
  	 	
  	 
  	 	<button type="submit" class="btn btn-primary">Send Message</button>
  	 </form>
  </div>


  @section('sidebar')
@include('layouts.sidebar')
 @endsection
@endsection