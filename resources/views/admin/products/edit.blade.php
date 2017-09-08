@extends('admin.layouts.admin')
@section('contents')


  <div class="col-lg-12">
      <h1 class="page-header">Edit product</h1>

  </div>
  {{-- end of header --}}

  {{-- show the product photos here --}}
  @foreach ($product->photos as $photo)
    <div class="col-md-2 product_image">

    <img class="img-responsive img-rounded admin_product_edit" height="100" src="{{ $photo->thumb() }}" alt="">
    {{-- button for delete the product photo --}}
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
  

 <div class="col-md-12 ">



{{-- form for edit the product details --}}
 {!! Form::model($product,['action'=>['AdminProductsController@update',$product->id],'method'=>'put','files' => true]) !!}


{{-- product name --}}
   <div class="form-group col-md-4 {{ $errors->has('name') ? ' has-error' : '' }}">
       {!! Form::label('name','product name', []) !!}
     {!! Form::text('name',null, ['class'=>"form-control",'value'=>old('name')]) !!}
   </div>

   {{-- product price --}}
     <div class="form-group col-md-4 {{ $errors->has('price') ? ' has-error' : '' }}">
       {!! Form::label('price','product price', []) !!}
     {!! Form::text('price',null, ['class'=>"form-control",'value'=>old('price')]) !!}
   </div>

{{-- product categories --}}
    <div class="form-group col-md-4">
       {!! Form::label('category','Select Category for product', []) !!}
     {!! Form::select('category_id',count($categories)>0?$categories:[0=>'uncategorized'],null, ['placeholder' => 'Pick a category...','class'=>'form-control']) !!}
   </div>
  

  {{-- product types --}}
    <div class="form-group col-md-4 {{ $errors->has('type') ? ' has-error' : '' }}">
       {!! Form::label('type','product types ,enter the name and type enter or seperate with ,', []) !!}
     {!! Form::text('type',$types, ['class'=>"form-control",'value'=>old('type'),'data-role'=>"tagsinput"]) !!}
   </div>
  

  {{-- product size --}}
 <div class="form-group col-md-4 {{ $errors->has('size') ? ' has-error' : '' }}">
       {!! Form::label('size','product size if product has size variations type the name and type enter or ,', []) !!}
     {!! Form::text('size',$sizes, ['class'=>"form-control",'value'=>old('size'),'data-role'=>"tagsinput"]) !!}
   </div>


{{-- product color --}}
   <div class="form-group col-md-4 {{ $errors->has('color') ? ' has-error' : '' }}">
       {!! Form::label('color','product color if product has color variations type the name and type enter or ,', []) !!}
     {!! Form::text('color',$colors, ['class'=>"form-control",'value'=>old('size'),'data-role'=>"tagsinput"]) !!}
   </div>

{{-- product stock level --}}
   <div class="form-group col-md-4">
       {!! Form::label('inStock','Set stock Level for this product', []) !!}
         {!! Form::number('inStock',null,['class'=>'form-control','min'=>1]) !!}
   </div>

   {{-- feature button --}}
       <div class="form-group col-md-4">
       {!! Form::label('is_feature','Feature this product', []) !!}
         
        <div class="checkbox">
          <label>
            {!! Form::checkbox('is_feature','1',$product->is_feature?'checked':'', []) !!}

            Want to feature it?
          </label>
        </div>
        
   </div>

   {{-- product image --}}
    <div class=" col-md-4">
       {!! Form::label('image[]','add  another  Photo', ['class'=>'btn btn-info']) !!}
     {!! Form::file('image[]', ['class'=>'form-control','multiple'=>true]) !!}
   </div>
{{-- product description --}}
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

