@extends('layouts.app')
@section('heading')
	<h1>terms and conditions</h1>
  
@endsection
@section('content')
  <div class="col-md-8">
  	{!!$termsAndConditions!!}
  </div>


  @section('sidebar')
@include('layouts.sidebar')
 @endsection
@endsection