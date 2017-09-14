@extends('layouts.app')
@section('heading')
    <h1>  checkout page  </h1>
@endsection

{{-- end of heading --}}


@section('content')
        
     
{{-- address tab --}}
<div class="section section-tabs">

	<div class="col-md-6">
		<div class="title">
			<h3>Address tab</h3>
		</div>

		<!-- Tabs with icons on Card -->
		<div class="card card-nav-tabs">
			<div class="header header-success">
				<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
				<div class="nav-tabs-navigation">
					<div class="nav-tabs-wrapper">
						<ul class="nav nav-tabs" data-tabs="tabs">

                        {{-- button for new address --}}
							<li class="active">
							<a href="#newaddress" data-toggle="tab">
									
									add new address
								</a>
							</li>

                      {{-- show button for all previous address --}}
                      @if (count($addresses)>0)
                          @foreach ($addresses as $address)
                       <li>
                          <a href="#address{{ $address->id }}" data-toggle="tab">
                              address {{ $address->id }}
                          </a>
                      </li>
                          @endforeach
                      @endif
                           
							
						</ul>
                        {{-- end of tav nav --}}
					</div>
                    {{-- end of tabvan wrapper --}}
				</div>
                {{-- end of tab navigation --}}
			</div>
            {{-- end of tab header --}}
			<div class="content">
				<div class="tab-content text-center">
                {{-- show the address create form --}}
					<div class="tab-pane active" id="newaddress">
                         @include('checkout.adressform')
					</div>

                    {{-- if previous address show them --}}
                     @if (count($addresses)>0)
                        @foreach ($addresses as $address)
                           <div class="tab-pane" id="address{{ $address->id }}">
                           @include('checkout.adressformmodel')

                           </div> 
                        @endforeach
                     @endif
					
					
				</div>
                {{-- end of tab content --}}
			</div>
            {{-- end of content --}}
		</div>
        {{-- end of card --}}
        </div>
        {{-- end of col-6 --}}
    </div>
<!-- End address Tabs with icons on Card -->

{{-- list the cart details to review again --}}
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <!--REVIEW ORDER-->
        <div class="panel panel-info">
            <div class="panel-heading">
                Review Order <div class="pull-right"><small><a class="btn btn-primary" href="{{route('cart.index')}}">Edit Cart</a></small></div>
            </div>

            {{-- end of panel heading --}}
            <div class="panel-body">
             {{-- list all the cart items --}}
             @foreach ($cartItems as $item)
                  <div class="col-sm-12 checkout_product_wrap">
                    {{-- show the product image --}}
                    <div class="col-sm-3 col-xs-3">
                      @php
                        // find the product by cart item id
                       $product=App\Product::find($item->id);
                      @endphp
                        @if (count($product->photos)>0)
                           
                            <img class="img-rounded" src="{{ asset('images/products/'.$product->photos()->first()->path ) }}" alt="{{ $product->name }}">
                        @else
                        <img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
                        @endif
                       
                    </div>
                    {{-- end of product img  --}}

                    {{-- show the product name and quantity --}}
                    <div class="col-sm-6 col-xs-6">

                        <div class="col-xs-12">
                          {{$product->name}}
                        </div>
                        <div class="col-xs-12">
                              <small>Quantity:
                                   <span>
                                     {{$item->qty}}
                                   </span>
                            

                             </small>
                      </div>
                    </div>
                    {{-- end of product name and quantity  --}}

                    {{-- show the product price --}}
                    <div class="col-sm-3 col-xs-3 text-right">
                        <h6><span>$</span>{{$item->price}}</h6>

                    </div>
                </div>
                {{-- end of product details col --}}
                   
             @endforeach
             

             {{-- show the total price with tax --}}
             <div class="col-sm-12"><hr /></div>
                <div class="col-sm-12">
                    <div class="col-xs-12">
                        <strong>Subtotal</strong>
                        <div class="pull-right"><span>$</span><span>{{ Cart::subtotal() }}</span></div>
                    </div>
                    {{-- end of subtotal --}}
                    <div class="col-xs-12">
                        <small>Tax</small>
                        <div class="pull-right"><span>{{ Cart::tax() }}</span></div>
                    </div>
                    {{-- end of tax --}}
                </div>
                <div class="col-sm-12"><hr /></div>
                <div class="col-sm-12">
                    <div class="col-xs-12">
                        <strong>Order Total</strong>
                        <div class="pull-right"><span>$</span><span>{{ Cart::total() }}</span></div>
                    </div>
                </div>
                {{-- end of total --}}
            </div>
            {{-- end of panel body --}}
        </div>
        {{-- end of panel --}}
        
    </div>
              
<!--REVIEW ORDER END-->
 

@endsection