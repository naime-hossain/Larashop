@extends('admin.layouts.admin')
@section('contents')
	{{-- expr --}}
   <div class="col-lg-12">
      <h1 class="page-header">{{ $user->name }}</h1>
  </div>
  <div class="row">
  	 <div class="col-md-6">
  	 	 @if ($user->photos)
                  
         @foreach ($user->photos as $photo)
            @if ($loop->index==0)
               <img  class="img-rounded" src="/images/users/{{ $photo->path }}" alt="">
            @endif
         

        @endforeach

       @endif
  	 </div>
  	 <div class="col-md-6">
  	 	<h2><i class="fa fa-message"></i> {{ $user->email }} </h2>
  	 	<h2><i class="fa fa-message"></i> {{ $user->role->name }} </h2>
  	 </div>
  </div>
@endsection
