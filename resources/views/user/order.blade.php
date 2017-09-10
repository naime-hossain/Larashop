@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    <h1>All of your order</h1>
    <p>Thanks for your interest</p>
@endsection
{{-- end of heading --}}
@section('content')
 

  <div class="col-md-12 ">
              
      <div class="panel panel-default order_page">

  {{-- display all the orders --}}
      @if(count($orders)>0)
      {{-- display buttons for order status --}}
      <div class="row">
       <div class="col-md-12">
         <a class="btn  btn-success" href="{{ route('order','deliver') }}" role="button">Delivered orders</a>
         <a class="btn  btn-primary" href="{{ route('order','pending') }}" role="button">pending orders</a>
       </div>
       </div>  
    {{-- end of row --}}

        {{-- loop through all the orders --}}
         @foreach($orders as $order)
         <div class="single_order_wrap main main-raised">
          <div class="panel-heading text-center bg-info">
          {{-- order id --}}
             <h2 class="text-success">Order id : {{$order->id}}</h2>
             {{-- order status --}}
           <p class="">Order Status : {{$order->is_deliver==1?'Delivered':'Pending'}}</p>
           {{-- order token --}}
           <p class="">Order Token : {{$order->order_token}}</p>
           {{-- total order cost --}}
           <p>Order Cost : ${{$order->total}}</p>
          </div>
          {{-- panel heading --}}
          <div class="panel-body text-center">
          
           <h3>Order Details</h3>
           @php
           // grab the products of this order
           $products=$order->products;
           @endphp
           {{-- table for product deatils --}}
            <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>product Id</th>
                    <th>product name</th>
                    <th>product quantity</th>
                    <th>product photo</th>
                    <th>product size</th>
                    <th>product color</th>
                    <th>product Price</th>
                  
                </tr>
            </thead>
            {{-- end of table head --}}
          
        
    <tbody>
    {{-- display the details of all product of specific order --}}
        @if (count($products)>0)
        @foreach ($products as $product)
        
            {{-- expr --}}
            <tr class="">
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            {{-- <td>{{ substr($product->body, 0,20)  }}</td> --}}
            <td>{{ $product->pivot->qty  }}</td>
            <td width='150'>
                @if ($product->photos->count()>0)
            
                      
            <img height="50" width="150" class="img-rounded" src="{{ asset($product->photos()->first()->thumb()) }}" alt="">
                   

            @endif
            </td>
            <td>{{ $product->pivot->size  }}</td>
            <td>{{ $product->pivot->color  }}</td>
            <td>${{ $product->pivot->total  }}</td>
        
         </tr>
            @endforeach
                            {{--  if no orders--}}
                                @else
                                  <tr>
                                    <td>no data</td>
                                    <td>no data</td>
                                    <td>no data</td>
                                    <td>no data</td>
                                    <td>no data</td>
                                    
                                </tr>
                                @endif
                                
                                



                            </tbody>
                            {{-- end of table body --}}
                        </table>
                        {{-- end of table --}}
                </div> 
                {{-- end of table-responsive --}}
              </div>
              {{-- end of panel body --}}
              </div> 
              {{-- end of single order wrap  --}}
         @endforeach
        
      @else
      @endif

     
        
    </div>
    {{-- en dof panel --}}
</div>
    <!--  end  col-12  -->
@endsection
