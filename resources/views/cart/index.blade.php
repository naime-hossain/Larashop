@extends('layouts.app')
@section('heading')
	<h1>Your cart</h1>
@endsection
{{-- end of heading section --}}
@section('content')

  <div class="col-md-12">
          <ol class="breadcrumb">
              <li>
                  <a href="/">Home</a>
              </li>
              
              <li class="active">Cart</li>
          </ol>
      </div>
      {{-- end of breadcum --}}

	<div class="col-md-9 all_products products_wrap">


      @if ($cartItems->count()>0)
         <div class="table-responsive">
             <table class="table table-hover">
                 <thead>
                     <tr>
                         <th>Product name</th>
                         <th>price</th>
                         {{-- <th>sub total</th> --}}
                         <th>quantity</th>
                         <th>size</th>
                         <th>color</th>
                         <th>Actions</th>
                     </tr>
                 </thead>
                 {{-- end of table head --}}
              <tbody>
              {{-- list the cart items --}}
                 @foreach ($cartItems as $cartItem)
                       @php
                           // find the product usinf cartitem id
                             $product=App\Product::find($cartItem->id);
                             if ($product) {
                              // grab the size and coors of the product as array
                               $sizes=$product->sizes()->pluck('name','name');
                              $colors=$product->colors()->pluck('name','name');
                             }else{
                              $sizes='';
                              $colors='';
                             }
                              
                           @endphp

                         <tr>
                             
                           <td>{{ $cartItem->name }}</td>
                           <td>${{ $cartItem->price}}</td>
                           
                   {{--     <td>
                          without tax:${{ $cartItem->subtotal}}
                         <p>
                          tax: ${{ $cartItem->tax()."( × ". $cartItem->qty.")" }}
                         </p>
                         <p>with tax: ${{ $cartItem->total() }}</p>
                       </td> --}}
                      {{-- form for update cart --}}
                    {!! Form::open(['action'=>['CartController@update',$cartItem->rowId],'method'=>'put','class'=>'']) !!}
                     <td width="50px">
                       <div class="form-group">
                       {!! Form::number('qty',$cartItem->qty, ['class'=>'form-control','min'=>1,'max'=>$product->inStock]) !!}
                        </div>
                    
            

                     </td>
                  <td>
                               
                                
                   @if ($sizes->count()>0)
                         <div class="form-group">
                        
                       {!! Form::select('size',$sizes,$cartItem->options->size, ['placeholder' => 'Pick a size...','class'=>'form-control','required']) !!}
                     </div>
                     @endif            
                          
                           
                  </td>
                  <td> 
                       @if ($colors->count()>0)
                         <div class="form-group">
                               
                               {!! Form::select('color',$colors,$cartItem->options->color, ['placeholder' => 'Pick a color...','class'=>'form-control','required']) !!}
                             </div>
                      @endif
                      
                         </td>

                               <td>
                          {!! Form::hidden('id', $product->id, []) !!}
                         {!! Form::submit("Update",
                         [
                         'class'=>'btn btn-default ',
                       
                         
                         ]) !!}
                            

                      {!! Form::close() !!}
                      {{-- form for remove item from cart --}}
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
              {{-- show the total --}}
                 <tr>
                   <td></td>
                   <td>
                   <p>sub total : ${{ Cart::subtotal() }}</p>
                   <p>tax : ${{ Cart::tax() }}</p>
                   Grand total: ${{ Cart::total() }}

                   </td>
                   <td></td>
                   <td>Items Total: {{ Cart::Count() }}</td>
                   <td></td>
                 </tr>
                </tbody>
                {{-- end of table body --}}
                     </table>
                   </div>
                   <a href="{{route('checkout')}}" title="" class="btn btn-primary center">Checkout</a>
                @else
                     <div class="col-md-8 col-md-offset-2">
                        <h4>your cart is empty
                         
                        </h4>
                        <p>If you like Our products, then check out <a target="_blank" href="{{ route('products') }}">All products</a> And choose from variety</p>
                        <a class="btn btn-primary" target="" href="{{ route('products') }}">All products</a>
                    </div>
            @endif




        </div>
	
@endsection
@section('sidebar')
@include('layouts.sidebar')
 @endsection

