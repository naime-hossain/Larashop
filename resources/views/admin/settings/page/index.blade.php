@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">Page Settings</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
 
{{-- if has page setting then show the edit form --}}
@if ($settings)
{!! Form::model($settings,['action'=>['AdminPageController@update',$settings->id],'method'=>'put','files' => true]) !!}
  @else
  {{-- if not then show the create from --}}
  {!! Form::open(['action'=>'AdminPageController@store','method'=>'post','files' => true]) !!}
@endif


{{-- contact page --}}
    <div class="form-group col-md-4">
       {!! Form::label('contactUs','Want Contact Us Page?', []) !!}
         
        <div class="checkbox">
          <label>
            {!! Form::checkbox('contactUs','1','checked', []) !!}

            Want Contact Us Page?
          </label>
        </div>
        
        
   </div> 


{{-- terms and condition --}}
   <div class="form-group col-md-12 {{ $errors->has('termsAndConditions') ? ' has-error' : '' }}">
       {!! Form::label('termsAndConditions','terms And Conditions ', []) !!}
     {!! Form::textarea('termsAndConditions',null, ['class'=>"form-control",'value'=>old('termsAndConditions'),'rows'=>10,]) !!}
   </div>


   {{-- return policy page  --}}

   <div class="form-group col-md-12 {{ $errors->has('returnPolicy') ? ' has-error' : '' }}">
       {!! Form::label('returnPolicy','Return Policy ', []) !!}
     {!! Form::textarea('returnPolicy',null, ['class'=>"form-control",'value'=>old('returnPolicy'),'rows'=>10,]) !!}
   </div>

  


{{-- submit --}}
    <div class="form-group col-md-12">
     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}

 </div>
@endsection
