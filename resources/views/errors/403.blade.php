@extends('layouts.app')
@section('heading')
	{{-- expr --}}
	<h1 class="text-center text-danger">opps!this page is not available</h1>

 
@endsection
{{-- end of heading --}}

@section('content')
<div class="col-md-8 col-md-offset-2">
  <img src="/images/404.gif" class="img-responsive img-raised img-rounded" alt="">
	
</div>
{{-- end of 404 image --}}
<div class="col-md-12 text-center">
 	<a href="/" class="btn btn-primary" title="">go home</a>
 </div>
{{-- end of redirect button --}}
@endsection