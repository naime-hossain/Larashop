@extends('layouts.app')
@section('heading')
	<h1>contact us</h1>
  
@endsection
{{-- end of heading --}}

@section('content')
  <div class="col-md-8">
  	 {!! Form::open(['action'=>'PageController@message','method'=>'post']) !!}
  	 	<legend>Let us know any query</legend>
  	 
     {{-- name --}}
  	 	<div class="form-group col-md-6">
  	 		{!! Form::label('name','Your Name', []) !!}
  	 		{!! Form::text('name',Auth::check()?Auth::user()->name:null, ['class'=>'form-control','required']) !!}
  	 	</div>
      {{-- email --}}
  	 	<div class="form-group col-md-6">
  	 		{!! Form::label('email','Your email', []) !!}
  	 		{!! Form::text('email',Auth::check()?Auth::user()->email:null, ['class'=>'form-control','required']) !!}
  	 	</div>
      {{-- message --}}
  	 	 	<div class="form-group col-md-12">
  	 		{!! Form::label('message','Your message', []) !!}
  	 		{!! Form::textarea('message',null, ['class'=>'form-control','required','rows'=>10]) !!}
  	 	</div>
  	 
  	 	{{-- submit --}}
  	 
  	 	<button type="submit" class="btn btn-primary">Send Message</button>
  	 {!! Form::close() !!}
     {{-- end of contact form --}}
  </div>
  {{-- end of col --}}
@endsection


{{-- sidebar --}}
@section('sidebar')
   @include('layouts.sidebar')
@endsection
