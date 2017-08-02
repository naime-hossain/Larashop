@extends('layouts.app')
@section('heading')
    <h1>  checkout page  </h1>
@endsection
@section('content')
        
      @if ($errors->count()>0)
        @include('alert.error')
        @endif
        
        {!! Form::open(['action'=>'AddressController@store','method'=>'post']) !!}
        
            
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                
                                <div class="col-md-12 ">
                                    
                                
                                {!! Form::label('country', 'Country name') !!}
                                
                                {!! Form::text('country','', ['class'=>'form-control','value'=>old('country')]) !!}
                                
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <div class="col-md-6 col-xs-12">
                                    {!! Form::label('first_name', 'first name') !!}
                                   
                                    {!! Form::text('first_name','', ['class'=>'form-control','value'=>old('first_name')]) !!}
                                </div>
                               </div>
                               <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <div class="col-md-6 col-xs-12">
                                    {!! Form::label('last_name', 'last name') !!}
                                   
                                    {!! Form::text('last_name','', ['class'=>'form-control','value'=>old('last_name')]) !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                               {!! Form::label('address', 'address') !!}
                                   
                                    {!! Form::text('address','', ['class'=>'form-control','value'=>old('address')]) !!}
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                  {!! Form::label('city', 'city') !!}
                                   
                                    {!! Form::text('city','', ['class'=>'form-control','value'=>old('city')]) !!}
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                 {!! Form::label('state', 'state') !!}
                                   
                                    {!! Form::text('state','', ['class'=>'form-control','value'=>old('state')]) !!}
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('zip') ? ' has-error' : '' }}">
                               <div class="col-md-12">
                                  {!! Form::label('zip', 'zip/postal code') !!}
                                   
                                    {!! Form::text('zip','', ['class'=>'form-control','value'=>old('zip')]) !!}
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                  {!! Form::label('phone', 'phone') !!}
                                   
                                    {!! Form::text('phone','', ['class'=>'form-control','value'=>old('phone')]) !!}
                                    </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                  {!! Form::label('email', 'email') !!}
                                   
                                    {!! Form::email('email','', ['class'=>'form-control','value'=>old('email')]) !!}
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="col-md-12">
                                 
                                   
                                    {!! Form::submit('procced to payment', ['class'=>'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                  
                </div>
                
                </form>
@endsection