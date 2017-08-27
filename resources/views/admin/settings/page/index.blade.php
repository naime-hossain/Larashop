@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">socaial Settings</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
 @if ($errors->count()>0)
  @include('alert.error')
@endif
   @if(Session::has('message'))
        @include('alert.success')
    @endif

@if ($settings)
{!! Form::model($settings,['action'=>['AdminPageController@update',$settings->id],'method'=>'put','files' => true]) !!}
  @else
  {!! Form::open(['action'=>'AdminPageController@store','method'=>'post','files' => true]) !!}
@endif


    <div class="form-group col-md-4">
       {!! Form::label('contactUs','Want Contact Us Page?', []) !!}
         
        <div class="checkbox">
          <label>
            {!! Form::checkbox('contactUs','1','checked', []) !!}

            Want Contact Us Page?
          </label>
        </div>
        
        
   </div> 

   <div class="form-group col-md-12 {{ $errors->has('termsAndConditions') ? ' has-error' : '' }}">
       {!! Form::label('termsAndConditions','terms And Conditions ', []) !!}
     {!! Form::textarea('termsAndConditions',null, ['class'=>"form-control",'value'=>old('termsAndConditions'),'rows'=>10,]) !!}
   </div>

   <div class="form-group col-md-12 {{ $errors->has('returnPolicy') ? ' has-error' : '' }}">
       {!! Form::label('returnPolicy','Return Policy ', []) !!}
     {!! Form::textarea('returnPolicy',null, ['class'=>"form-control",'value'=>old('returnPolicy'),'rows'=>10,]) !!}
   </div>

  



    <div class="form-group col-md-12">
     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}

 </div>
@endsection
