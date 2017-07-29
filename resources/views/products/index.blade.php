@extends('layouts.app')
@section('heading')
	<h1>All Of Our Products</h1>
@endsection
@section('content')
  <div class="col-md-12">
          <ol class="breadcrumb">
              <li>
                  <a href="/">Home</a>
              </li>
              
              <li class="active">{{ Route::currentRouteName() }}</li>
          </ol>
      </div>
	<div class="col-md-9 all_products products_wrap">
		  

            @if ($products->count()>0)
               @include('layouts.products')
                <div class="col-md-12">
                  {{ $products->links() }}
                </div> 
                
            @endif




        </div>
	
@endsection
@section('sidebar')
@include('layouts.sidebar')
 @endsection
 {{-- @section('script')
  <script  type="text/javascript">
$(document).ready(function(){
$(document).on('click','.pagination a', function (e) {
  e.preventDefault();
  var url=$(this).attr('href');
  var pageNbr=url.split('page=')[1];

$.get(url,function(data){
   $('.all_products').html(data);
   location.hash=pageNbr;
})
});

});


</script>
 @endsection --}}
