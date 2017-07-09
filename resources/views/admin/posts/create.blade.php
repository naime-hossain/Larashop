@extends('admin.layouts.admin')
@section('contents')


  <div class="col-lg-12">
      <h1 class="page-header">Create New Post</h1>
  </div>

 <div class="col-md-8 col-offset-2">
 @if ($errors->count()>0)
  @include('alert.error')
@endif
   @if(Session::has('message'))
        @include('alert.success')
    @endif


 {!! Form::open(['action'=>'AdminPostsController@store','method'=>'post','files' => true]) !!}

   <div class="form-group col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
       {!! Form::label('title','Post title', []) !!}
   	 {!! Form::text('title',null, ['class'=>"form-control",'value'=>old('title')]) !!}
   </div>

    <div class="form-group col-md-6">
       {!! Form::label('category','Select Category for Post', []) !!}
   	 {!! Form::select('category_id',$categories,'', ['placeholder' => 'Pick a category...','class'=>'form-control']) !!}
   </div>

    <div class=" col-md-6">
       {!! Form::label('photo_id','Select a Photo', ['class'=>'btn btn-info']) !!}
   	 {!! Form::file('photo_id', ['class'=>'form-control']) !!}
   </div>

    <div class="form-group col-md-12 {{ $errors->has('body') ? ' has-error' : '' }}">
       {!! Form::label('body','Post body', []) !!}
     {!! Form::textarea('body',null,['class'=>'form-control','value'=>old('body'),'rows'=>5]) !!}
   </div>


    <div class="form-group col-md-12">
   	 {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
   </div>
   

 {!! Form::close() !!}

 </div>
@endsection
