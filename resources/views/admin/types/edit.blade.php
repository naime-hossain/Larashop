@extends('admin.layouts.admin')
@section('contents')


  <div class="col-lg-12">
      <h1 class="page-header">Update Category</h1>
  </div>
{{-- end of header --}}
 <div class="col-md-8 col-offset-2">

{{-- form for create --}}
 {!! Form::model($category,['action'=>['AdminCategoriesController@update',$category->id],'method'=>'put']) !!}

   <div class="form-group col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
     {!! Form::label('name','Category name', []) !!}
   	 {!! Form::text('name',null, ['class'=>"form-control"]) !!}
   </div>

   
    <div class="form-group col-md-12">
   	 {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}

 </div>
@endsection
