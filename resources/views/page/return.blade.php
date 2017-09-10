@extends('layouts.app')
@section('heading')
	<h1>return policy</h1>
  
@endsection
{{-- end of heading  --}}
@section('content')
  <div class="col-md-8">
  {{-- show the return policy text --}}
  	{!!$returnPolicy!!}
  </div>


  @section('sidebar')
@include('layouts.sidebar')
 @endsection
@endsection