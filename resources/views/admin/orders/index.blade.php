@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All Orders</h1>
  </div>
  

  <!--End Page Header -->

  <div class="col-md-12 ">
                     <!--    Context Classes  -->
      <div class="panel panel-default order_page">

    

      
      @if(Session::has('message'))
      @include('alert.success')
      @endif
      @if(count($orders)>0)
      {{ $orders->links() }}
         @foreach($orders as $order)
         <div class="single_order_wrap img-raised">
          <div class="panel-heading text-center">
          <div class="table-responsive bg-info">
           <h3>Order Info</h3>
             <table class="table table-bordered ">
               <thead>
                 <tr>
                   <th>Order No</th>
                   <th>Order status</th>
                   <th>Order token</th>
                   <th>Order by</th>
                   
                   <th>Order Paid</th>
                   <th>Actions</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td>{{$order->id}}</td>
                   <td>{{$order->is_deliver==1?'Delivered':'Pending'}}</td>
                   <td>{{$order->order_token}}</td>
                   <td>{{ $order->user->name }}</td>
                   
                   <td>${{$order->total}}</td>
                 </tr>
               </tbody>
             </table>
            </div>
            {{-- customer address --}}
             <div class="table-responsive bg-success">
           <h3>Shiping Address</h3>
             <table class="table table-bordered ">
               <thead>
                 <tr>
                   <th>Firstname</th>
                   <th>Last Name</th>
                   <th>Country</th>
                   <th>city</th>
                   
                   <th>address</th>
                   <th>Zip</th>
                   <th>phone</th>
                   <th>email</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td>{{$order->address->first_name}}</td>
                   <td>{{$order->address->last_name}}</td>
                   <td>{{$order->address->country}}</td>
                   <td>{{$order->address->city}}</td>
                   <td>{{$order->address->address}}</td>
                   <td>{{$order->address->zip}}</td>
                   <td>{{$order->address->phone}}</td>
                   <td>{{$order->address->email}}</td>
                  
                 </tr>
               </tbody>
             </table>
            </div>
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
            <td>
                @if ($product->photos)
            
                        @foreach ($product->photos as $photo)
                        @if ($loop->index==0)
                            <img height="50" width="150" class="img-rounded" src="/images/products/{{ $photo->path }}" alt="">
                        @endif
                        

                    @endforeach

            @endif
            </td>
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
