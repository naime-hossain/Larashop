@extends('layouts.app')
@section('heading')
    {{-- expr --}}
     <h1>{{ $archive_type }} Archive</h1>
    
    @if (isset($products))
        @if ($products->count()>0)
        <p>All product of {{ $name?$name->name:$archive_name  }} {{ $archive_type }}</p>
        @else
        <p>There is no product in {{ $name?$name->name:$archive_name  }} {{ $archive_type }}</p>
        @endif
      @else
        <p>There is no product in {{ $name?$name->name:$archive_name  }} {{ $archive_type }}</p>  
    @endif
@endsection
 
 		@section('content')
     <div class="col-md-12">
           <ol class="breadcrumb">
              <li>
                  <a href="/">Home</a>
              </li>
              <li>
                  <a href="{{ url()->current() }}">archive</a>
              </li>
               <li>
                  <a href="{{ route('products') }}">{{ $archive_type }}</a>
              </li>
              
              <li class="active">{{ $name?$name->name:$archive_name }}</li>
          </ol>
     </div>

 	
    <div class="col-md-9 all_products products_wrap">
       <div class="">

         @if (isset($products))
              @if ($products->count()>0)
                @include('layouts.products')
              @else
             
            @endif
         @endif





        </div>
  </div>  
@endsection
@section('sidebar')
@include('layouts.sidebar')
 @endsection
 

