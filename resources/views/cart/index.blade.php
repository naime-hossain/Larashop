@extends('layouts.app')
@section('heading')
	<h1>Your cart</h1>
@endsection
@section('content')
  <div class="col-md-12">
          <ol class="breadcrumb">
              <li>
                  <a href="/">Home</a>
              </li>
              
              <li class="active">Cart</li>
          </ol>
      </div>
	<div class="col-md-9 all_products products_wrap">
		  

            @if ($cartItems->count()>0)
               <div class="table-responsive">
                     <table class="table table-hover">
                       <thead>
                         <tr>
                           <th>Product name</th>
                           <th>price</th>
                           <th>sub total</th>
                           <th>quantity</th>
                           <th>size</th>
                           <th>Actions</th>
                         </tr>
                       </thead>
                       <tbody>
                @foreach ($cartItems as $cartItem)
                
                       
                         <tr>
                          <td>{{ $cartItem->name }}</td>
                       <td>{{ $cartItem->price}}</td>
                       <td>without tax:{{ $cartItem->subtotal}}
                         <p>tax: {{ $cartItem->tax()."( × ". $cartItem->qty.")" }}</p>
                         <p>with tax: {{ $cartItem->total() }}</p>
                       </td>
                  
                {!! Form::open(['action'=>['CartController@update',$cartItem->rowId],'method'=>'put','class'=>'']) !!}
                           <td width="50px">
                           <div class="form-group">
                           {!! Form::number('qty',$cartItem->qty, ['class'=>'form-control']) !!}
                            </div>
                   
                  

                           </td>
                           <td>
                <div class="form-group">


              {!! Form::select('size',['small'=>'small','medium'=>'medium','large'=>'large'],$cartItem->options->size, ['class'=>'form-control']) !!}

              </div>
</td>
                           <td>
                     {!! Form::submit("Update",
                     [
                     'class'=>'btn btn-default ',
                   
                     
                     ]) !!}
                        

                  {!! Form::close() !!}
                {!! Form::open(['action'=>['CartController@destroy',$cartItem->rowId],
                'method'=>'delete','class'=>'']) !!}
                   
                    {!! Form::button("<i class='fa fa-trash-o'></i> ",
                     [
                     'class'=>'btn btn-danger ',
                   
                     'type'=>'submit'
                     ]) !!}
                        

                  {!! Form::close() !!}

                           </td>
                         </tr>
                     
                @endforeach

                 <tr>
                   <td></td>
                   <td>
                   <p>sub total : {{ Cart::subtotal() }}</p>
                   <p>tax : {{ Cart::tax() }}</p>
                   Grand total: {{ Cart::total() }}

                   </td>
                   <td></td>
                   <td>Items Total: {{ Cart::Count() }}</td>
                   <td></td>
                 </tr>
                 </tbody>
                     </table>
                   </div>
                   <a href="{{route('checkout')}}" title="" class="btn btn-primary center">Checkout</a>
                
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
