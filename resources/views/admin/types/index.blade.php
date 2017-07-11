@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All types</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
   <div class="create_type">
     <span href="" data-toggle="modal" data-target="#createtype" class="close-icon btn btn-success" title="">Create New type</span>
       
   </div>
                     <!--    Context Classes  -->
                    <div class="panel panel-default">

                        <div class="panel-heading">
                          types Database
                        </div>

                        <div class="panel-body">
                            @if(Session::has('message'))
                           @include('alert.success')
                           @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>name</th>
                                            <th>Products</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (count($types)>0)
                                      @foreach ($types as $type)
                                     
                                         {{-- expr --}}
                                           <tr class="">
                                          <td>{{ $type->id }}</td>
                                            <td>{{ $type->name }}</td>
                                            <td>{{ $type->products?$type->products->count():0 }}</td>
                                         
                                              <td>{{ $type->created_at?$type->created_at->diffForHumans():'no time' }}</td>
                                              <td>{{ $type->updated_at?$type->updated_at->diffForHumans():'no time' }}</td>
                                            <td>
                                         
                  <span href="" data-toggle="modal" data-target="#edittype{{ $type->id }}" class="close-icon btn btn-info" title=""><i class="fa fa-edit"></i></span>
             <!-- edittype Modal Core -->
          <div class="modal fade" id="edittype{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="edittype{{ $type->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="edittype{{ $type->id }}Label">Want to edit The type?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                  {!! Form::model($type,['action'=>['AdminTypesController@update',$type->id],'method'=>'put']) !!}

               <div class="form-group col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                 {!! Form::label('name','type name', []) !!}
                 {!! Form::text('name',null, ['class'=>"form-control"]) !!}
               </div>

               
                <div class="form-group col-md-12">
                 {!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
               </div>
               

             {!! Form::close() !!}
              </div>
                </div>
            
              </div>
            </div>
          </div>
       {{-- model end --}} 

                <span href="" data-toggle="modal" data-target="#deletetype{{ $type->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>
             <!-- deletetype Modal Core -->
          <div class="modal fade" id="deletetype{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="deletetype{{ $type->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="deletetype{{ $type->id }}Label">Want to remove The type?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                  {!! Form::open(['action'=>['AdminTypesController@destroy',$type->id],'method'=>'delete','class'=>'sm-form']) !!}
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
                                            

                                             
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{ $types->links() }}
                                        @else
                                          <tr>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                          
                                        </tr>
                                       @endif
                                      
                                      



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                      <!-- createtype Modal Core -->
          <div class="modal fade" id="createtype" tabindex="-1" role="dialog" aria-labelledby="createtypeLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="createtypeLabel">Create New type?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                 {!! Form::open(['action'=>'AdminTypesController@store','method'=>'post']) !!}

   <div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
     {!! Form::label('name','type name', []) !!}
     {!! Form::text('name',null, ['class'=>"form-control",'value'=>old('name')]) !!}
   </div>

   
    <div class="form-group col-md-12">
     {!! Form::submit('Create', ['class'=>'btn btn-success']) !!}
   </div>
   

 {!! Form::close() !!}

               </div>
                </div>
            
              </div>
            </div>
          </div>
       {{-- model end --}} 
                    </div>

@endsection
