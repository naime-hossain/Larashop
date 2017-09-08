@extends('admin.layouts.admin')

{{-- start contents --}}
@section('contents')


  <div class="col-lg-12">
      <h1 class="page-header">Create New Category</h1>
  </div>

{{-- col for main contents --}}
 <div class="col-md-8 col-offset-2">



 {!! Form::open(['action'=>'AdminCategoriesController@store','method'=>'post']) !!}

   <div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
     {!! Form::label('name','Category name', []) !!}
     {!! Form::text('name',null, ['class'=>"form-control",'value'=>old('name')]) !!}
   </div>

   
    <div class="form-group col-md-12">
     {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}
 {{-- end of form --}}

 </div>
 {{-- end of main col --}}
@endsection
{{-- end of contnets --}}
