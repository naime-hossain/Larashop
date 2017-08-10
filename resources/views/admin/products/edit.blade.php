@extends('admin.layouts.admin')
@section('contents')


  <div class="col-lg-12">
      <h1 class="page-header">Edit product</h1>

  </div>
  @foreach ($product->photos as $photo)
    <div class="col-md-2 product_image">

    <img class="img-responsive img-rounded admin_product_edit" height="100" src="{{ $photo->thumb() }}" alt="">
    <span href="" data-toggle="modal" data-target="#deletephoto{{ $photo->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>
             <!-- deletephoto Modal Core -->
          <div class="modal fade" id="deletephoto{{ $photo->id }}" tabindex="-1" role="dialog" aria-labelledby="deletephoto{{ $photo->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="deletephoto{{ $photo->id }}Label">Want to remove The photo?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                  {!! Form::open(['action'=>['AdminProductsController@remove_photo',$product->id,$photo->id],'method'=>'get','class'=>'sm-form']) !!}
                    {!! Form::button("Yes",
                     [
                     'class'=>'btn btn-danger',
                   
                     'type'=>'submit'
                     ]) !!}
                        

                  {!! Form::close() !!}
              </div>
                </div>
            
              </div>
            </div>
          </div>
       {{-- model end --}} 
  </div>
  @endforeach
  

 <div class="col-md-8 col-offset-2">
 @if ($errors->count()>0)
  @include('alert.error')
@endif
   @if(Session::has('message'))
        @include('alert.success')
    @endif



 {!! Form::model($product,['action'=>['AdminProductsController@update',$product->id],'method'=>'put','files' => true]) !!}

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
     {!! Form::select('category_id',count($categories)>0?$categories:[0=>'uncategorized'],null, ['placeholder' => 'Pick a category...','class'=>'form-control']) !!}
   </div>
    <div class="form-group col-md-6">
       {!! Form::label('type','Select type for product', []) !!}
     {!! Form::select('type_id',count($types)>0?$types:[0=>'uncategorized'],null, ['placeholder' => 'Pick a type...','class'=>'form-control']) !!}
   </div>
    <div class="form-group col-md-6 {{ $errors->has('new_type') ? ' has-error' : '' }}">
       {!! Form::label('new_type','Add a new Type', []) !!}
     {!! Form::text('new_type',null, ['class'=>"form-control",'value'=>old('new_type')]) !!}
   </div>
 <div class="form-group col-md-6">
       {!! Form::label('size','Select size for product', []) !!}
     {!! Form::select('size',['small'=>'small','medium'=>'medium','large'=>'large'],null, ['placeholder' => 'Pick a size...','class'=>'form-control']) !!}
   </div>

   <div class="form-group col-md-6">
       {!! Form::label('inStock','Set stock Level for this product', []) !!}
         {!! Form::number('inStock',null,['class'=>'form-control']) !!}
   </div>
    <div class=" col-md-6">
       {!! Form::label('image[]','add  another  Photo', ['class'=>'btn btn-info']) !!}
     {!! Form::file('image[]', ['class'=>'form-control','multiple'=>true]) !!}
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

