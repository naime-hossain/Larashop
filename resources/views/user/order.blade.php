@extends('layouts.app')
@section('heading')
    {{-- expr --}}
    <h1>All of your order</h1>
    <p>Thanks for your interest</p>
@endsection
@section('content')
  <div class="col-lg-12">
      {{-- <h1 class="page-header">Your orders</h1> --}}
  </div>
  <!--End Page Header -->

  <div class="col-md-12 ">
               <!--    Context Classes  -->
      <div class="panel panel-default order_page">

    

      
      @if(Session::has('message'))
      @include('alert.success')
      @endif
      @if(count($orders)>0)
      <div class="row">
       <div class="col-md-12">
         <a class="btn  btn-success" href="{{ route('order','deliver') }}" role="button">Delivered orders</a>
         <a class="btn  btn-primary" href="{{ route('order','pending') }}" role="button">pending orders</a>
       </div>
       </div>  
    
         @foreach($orders as $order)
         <div class="single_order_wrap main main-raised">
          <div class="panel-heading text-center bg-info">
             <h2 class="text-success">Order id : {{$order->id}}</h2>
           <p class="">Order Status : {{$order->is_deliver==1?'Delivered':'Pending'}}</p>
           <p class="">Order Token : {{$order->order_token}}</p>
           <p>Order Cost : ${{$order->total}}</p>
          </div>
          <div class="panel-body text-center">
          
           <h3>Order Details</h3>
           @php
           $products=$order->products;
           @endphp
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
          
        
    <tbody>
        @if (count($products)>0)
        @foreach ($products as $product)
        
            {{-- expr --}}
            <tr class="">
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            {{-- <td>{{ substr($product->body, 0,20)  }}</td> --}}
            <td>{{ $product->pivot->qty  }}</td>
            <td width='150'>
                @if ($product->photos)
            
                        @foreach ($product->photos as $photo)
                        @if ($loop->index==0)
                            <img height="50" width="150" class="img-rounded" src="/images/products/{{ $photo->path }}" alt="">
                        @endif
                        

                    @endforeach

            @endif
            </td>
            <td>{{ $product->pivot->size  }}</td>
            <td>{{ $product->pivot->color  }}</td>
            <td>${{ $product->pivot->total  }}</td>
        
         </tr>
            @endforeach
                            
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
                        </table>
                </div> 
              </div>
              </div>   
         @endforeach
        
      @else
      @endif

     
        
    </div>
</div>
    <!--  end  Context Classes  -->
@endsection
