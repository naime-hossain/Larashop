@extends('layouts.app')
@section('heading')
    {{-- show the archive type:such as:category/size --}}
     <h1>{{ $archive_type }} Archive</h1>
    {{-- show the archive name  suc as:men/medium --}}
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
     {{-- end of breadcum --}}

 	
    <div class="col-md-9 all_products products_wrap">
           {{-- list the products if any --}}
         @if (isset($products))
              @if ($products->count()>0)
                @include('layouts.products')
              @else
             
            @endif
         @endif
  </div>  
  {{-- end of col --}}
@endsection
{{-- end of content section --}}

{{-- start sidebar section --}}
@section('sidebar')
@include('layouts.sidebar')
 @endsection
 

