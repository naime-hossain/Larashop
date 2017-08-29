@extends('layouts.app')
@section('heading')
	<h1>contact us</h1>
  
@endsection
@section('content')
  <div class="col-md-8">
  	 <form action="" method="POST" role="form">
  	 	<legend>Let us know any query</legend>
  	 
  	 	<div class="form-group">
  	 		<label for="">label</label>
  	 		<input type="text" class="form-control" id="" placeholder="Input field">
  	 	</div>
  	 
  	 	
  	 
  	 	<button type="submit" class="btn btn-primary">Submit</button>
  	 </form>
  </div>


  @section('sidebar')
@include('layouts.sidebar')
 @endsection
@endsection