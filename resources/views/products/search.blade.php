@extends('layouts.app')
@section('heading')
	<h1>You search for <strong>{{ $search }}</strong></h1>
  
@endsection
{{-- end of heading --}}
@section('content')
  <div class="col-md-12">
          <ol class="breadcrumb">
              <li>
                  <a href="/">Home</a>
              </li>
              
              <li class="active">{{ Route::currentRouteName() }}</li>
          </ol>
      </div>
      {{-- end of bredcrumb --}}
	<div class="col-md-9 all_products products_wrap">
		      {{-- list the all products --}}
            @if ($products->count()>0)
               @include('layouts.products')
                <div class="col-md-12">
                  {{ $products->links() }}
                </div> 
                @else
                <h3>sorry no product found</h3>
            @endif




        </div>
        {{-- end of left col --}}
	
@endsection

{{-- side bar section --}}
@section('sidebar')
@include('layouts.sidebar')
 @endsection

