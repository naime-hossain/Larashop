@extends('layouts.app')
@section('heading')
	<h1>return policy</h1>
  
@endsection
@section('content')
  <div class="col-md-8">
  	{!!$returnPolicy!!}
  </div>


  @section('sidebar')
@include('layouts.sidebar')
 @endsection
@endsection