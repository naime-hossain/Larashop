@extends('layouts.app')
@section('heading')
	<h1>terms and conditions</h1>
  
@endsection
{{-- end of heading --}}
@section('content')
  <div class="col-md-8">
  {{-- the terms and condition --}}
  	{!!$termsAndConditions!!}
  </div>


  @section('sidebar')
@include('layouts.sidebar')
 @endsection
@endsection