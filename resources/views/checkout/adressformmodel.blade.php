	{{-- show this form if select existing address --}}

{!! Form::model($address,['action'=>['AddressController@store'],'method'=>'post']) !!}


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!--SHIPPING METHOD-->
        <div class="panel panel-info">
            <div class="panel-heading">Address No:{{ $address->id }}</div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-12">
                        <h4>existing Shipping Address</h4>
                    </div>
                </div>

                {{-- hiddden address id to determine which address is selected --}}
                <div class="form-group">
                   {!! Form::hidden('address_id',$address->id, []) !!} 
                    
                </div>

                {{-- country --}}
                <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                    
                    <div class="col-md-12 ">
                        
                    
                    {!! Form::label('country', 'Country name') !!}
                    
                    {!! Form::text('country',null, ['class'=>'form-control']) !!}
                    
                    </div>
                </div>

                {{-- first name --}}
                <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <div class="col-md-6 col-xs-12">
                        {!! Form::label('first_name', 'first name') !!}
                       
                        {!! Form::text('first_name',null, ['class'=>'form-control']) !!}
                    </div>
                   </div>

                   {{-- last name --}}
                   <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <div class="col-md-6 col-xs-12">
                        {!! Form::label('last_name', 'last name') !!}
                       
                        {!! Form::text('last_name',null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                {{-- address --}}
                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                <div class="col-md-12">
                   {!! Form::label('address', 'address') !!}
                       
                        {!! Form::text('address',null, ['class'=>'form-control']) !!}
                        </div>
                </div>

                {{-- city --}}
                <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                <div class="col-md-12">
                      {!! Form::label('city', 'city') !!}
                       
                        {!! Form::text('city',null, ['class'=>'form-control']) !!}
                        </div>
                </div>

                {{-- state --}}
                <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                <div class="col-md-12">
                     {!! Form::label('state', 'state') !!}
                       
                        {!! Form::text('state',null, ['class'=>'form-control']) !!}
                        </div>
                </div>

                {{-- zip code --}}
                <div class="form-group {{ $errors->has('zip') ? ' has-error' : '' }}">
                   <div class="col-md-12">
                      {!! Form::label('zip', 'zip/postal code') !!}
                       
                        {!! Form::text('zip',null, ['class'=>'form-control']) !!}
                        </div>
                </div>

                {{-- phone number --}}
                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                      {!! Form::label('phone', 'phone number with country code') !!}
                       
                        {!! Form::text('phone',null, ['class'=>'form-control']) !!}
                        </div>
                </div>

                {{-- email  --}}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                      {!! Form::label('email', 'email') !!}
                       
                        {!! Form::email('email',null, ['class'=>'form-control']) !!}
                    </div>
                </div>

                {{-- submit button --}}
                  <div class="form-group">
                    <div class="col-md-12">
                     
                       
                        {!! Form::submit('procced to payment', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
        <!--SHIPPING METHOD END-->
      
    </div>
    
    {!! Form::close() !!}