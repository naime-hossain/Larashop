@extends('layouts.app')
@section('heading')
    <h1>  checkout page  </h1>
@endsection
@section('content')
        
      @if ($errors->count()>0)
        @include('alert.error')
        @endif
        
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
							<li class="active">
							<a href="#newaddress" data-toggle="tab">
									
									add new address
								</a>
							</li>
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
					</div>
				</div>
			</div>
			<div class="content">
				<div class="tab-content text-center">
					<div class="tab-pane active" id="newaddress">
                         @include('checkout.adressform')
					</div>
                     @if (count($addresses)>0)
                        @foreach ($addresses as $address)
                           <div class="tab-pane" id="address{{ $address->id }}">
                           @include('checkout.adressformmodel')

                           </div> 
                        @endforeach
                     @endif
					
					
				</div>
			</div>
		</div>
        </div>
        </div>
<!-- End Tabs with icons on Card -->
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="btn btn-primary" href="{{route('cart.index')}}">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                         
                         @foreach ($cartItems as $item)
                                <div class="col-sm-12">
                                <div class="col-sm-3 col-xs-3">
                                  @php
                                
                                   $product=App\Product::find(1);
                                  @endphp
                                    @if (count($product->photos)>0)
                                        @foreach ($product->photos as $photo)
                                            @if ($loop->index==0)
                                                <img class="img-rounded" src="/images/products/{{  $photo->path }}" alt="{{ $product->name }}">
                                            @endif
                                            
                                        @endforeach
                                            @else
                                            <img class="img-responsive" src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg" />
                                    @endif
                                   
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{$item->id}}</div>
                                    <div class="col-xs-12"><small>Quantity:<span>{{$item->qty}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>$</span>{{$item->price}}</h6>
                                </div>
                            </div>
                               
                         @endforeach
                         
                         <div class="col-sm-12"><hr /></div>
                            <div class="col-sm-12">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>$</span><span>{{ Cart::subtotal() }}</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Tax</small>
                                    <div class="pull-right"><span>{{ Cart::tax() }}</span></div>
                                </div>
                            </div>
                            <div class="col-sm-12"><hr /></div>
                            <div class="col-sm-12">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span>{{ Cart::total() }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
@endsection