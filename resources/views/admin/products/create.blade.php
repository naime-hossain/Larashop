@extends('admin.layouts.admin')
@section('contents')


  <div class="col-lg-12">
      <h1 class="page-header">Create New product</h1>
  </div>

 <div class="col-md-8 col-offset-2">
 @if ($errors->count()>0)
  @include('alert.error')
@endif
   @if(Session::has('message'))
        @include('alert.success')
    @endif


 {!! Form::open(['action'=>'AdminProductsController@store','method'=>'post','files' => true]) !!}

   <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
       {!! Form::label('name','product name', []) !!}
   	 {!! Form::text('name',null, ['class'=>"form-control",'value'=>old('name')]) !!}
   </div>
     <div class="form-group col-md-6 {{ $errors->has('price') ? ' has-error' : '' }}">
       {!! Form::label('price','product price', []) !!}
     {!! Form::text('price',null, ['class'=>"form-control",'value'=>old('price')]) !!}
   </div>

    <div class="form-group col-md-6">
       {!! Form::label('category','Select Category for product', []) !!}
   	 {!! Form::select('category_id',count($categories)>0?$categories:[0=>'uncategorized'],'', ['placeholder' => 'Pick a category...','class'=>'form-control']) !!}
   </div>
    <div class="form-group col-md-6">
       {!! Form::label('type','Select type for product', []) !!}
     {!! Form::select('type_id',count($types)>0?$types:[0=>'uncategorized'],'', ['placeholder' => 'Pick a type...','class'=>'form-control']) !!}
   </div>
 <div class="form-group col-md-6">
       {!! Form::label('size','Select size for product', []) !!}
     {!! Form::select('size',['small'=>'small','medium'=>'medium','large'=>'large'],'', ['placeholder' => 'Pick a size...','class'=>'form-control']) !!}
   </div>
    <div class=" col-md-6">
       {!! Form::label('image','Select a Photo', ['class'=>'btn btn-info']) !!}
   	 {!! Form::file('image', ['class'=>'form-control']) !!}
   </div>

    <div class="form-group col-md-12 {{ $errors->has('body') ? ' has-error' : '' }}">
       {!! Form::label('description','product description', []) !!}
     {!! Form::textarea('description',null,['class'=>'form-control','value'=>old('description'),'rows'=>5]) !!}
   </div>


    <div class="form-group col-md-12">
   	 {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}

 </div>
@endsection
