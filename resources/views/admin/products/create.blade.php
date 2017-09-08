@extends('admin.layouts.admin')

{{-- all contents shows here --}}
@section('contents')


  <div class="col-lg-12">
      <h1 class="page-header">Create New product</h1>
  </div>
{{-- end of page header --}}

 <div class="col-md-12">
{{-- form for create or add new product --}}
 {!! Form::open(['action'=>'AdminProductsController@store','method'=>'post','files' => true]) !!}


{{-- name field --}}
   <div class="form-group col-md-4 {{ $errors->has('name') ? ' has-error' : '' }}">
       {!! Form::label('name','product name', []) !!}
   	 {!! Form::text('name',null, ['class'=>"form-control",'value'=>old('name')]) !!}
   </div>

   {{-- price field --}}
     <div class="form-group col-md-4 {{ $errors->has('price') ? ' has-error' : '' }}">
       {!! Form::label('price','product price', []) !!}
     {!! Form::text('price',null, ['class'=>"form-control",'value'=>old('price')]) !!}
   </div>


{{-- category field --}}
    <div class="form-group col-md-4">
       {!! Form::label('category','Select Category for product', []) !!}
   	 {!! Form::select('category_id',count($categories)>0?$categories:[0=>'uncategorized'],'', ['placeholder' => 'Pick a category...','class'=>'form-control']) !!}
   </div>

   {{-- type field --}}
    <div class="form-group col-md-4">
       {!! Form::label('type','Select type for product', []) !!}
     {!! Form::select('type_id',count($types)>0?$types:[0=>'uncategorized'],'', ['placeholder' => 'Pick a type...','class'=>'form-control']) !!}
   </div>


{{-- size field --}}
    <div class="form-group col-md-4 {{ $errors->has('size') ? ' has-error' : '' }}">
       {!! Form::label('size','product size if product has size variations type the name and type enter or ,', []) !!}
     {!! Form::text('size',$sizes, ['class'=>"form-control",'value'=>old('size'),'data-role'=>"tagsinput"]) !!}
   </div>


{{-- color field --}}
   <div class="form-group col-md-4 {{ $errors->has('color') ? ' has-error' : '' }}">
       {!! Form::label('color','product color if product has color variations type the name and type enter or ,', []) !!}
     {!! Form::text('color',$colors, ['class'=>"form-control",'value'=>old('size'),'data-role'=>"tagsinput"]) !!}
   </div>

{{-- stock control filed --}}
    <div class="form-group col-md-4">
       {!! Form::label('inStock','Set stock Level for this product', []) !!}
         {!! Form::number('inStock','',['class'=>'form-control','min'=>1]) !!}
   </div>

   {{-- feature field --}}
       <div class="form-group col-md-4">
       {!! Form::label('is_feature','Feature this product', []) !!}
         
        <div class="checkbox">
          <label>
            {!! Form::checkbox('is_feature','1','', []) !!}
            Want to feature it?
          </label>
        </div>
        
   </div>

{{-- product image field --}}
    <div class=" col-md-4">
       {!! Form::label('image[]','Select a Photo', ['class'=>'btn btn-info']) !!}
   	 {!! Form::file('image[]', ['class'=>'form-control','multiple'=>true]) !!}
   </div>


{{-- product description field --}}
    <div class="form-group col-md-12 {{ $errors->has('body') ? ' has-error' : '' }}">
       {!! Form::label('description','product description', []) !!}
     {!! Form::textarea('description',null,['class'=>'form-control','value'=>old('description'),'rows'=>15]) !!}
   </div>

{{-- submit button --}}
    <div class="form-group col-md-12">
   	 {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}
 {{-- end of the form --}}

 </div>
@endsection
