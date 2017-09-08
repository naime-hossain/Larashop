{{-- extending the admin layouts --}}
@extends('admin.layouts.admin')

{{-- start of the contents section --}}
@section('contents')
<section class="content-header">
  <div class="col-lg-12">
      <h1 class="page-header">All categories</h1>
  </div>
  </section>
  <!--End Page Header -->

  <div class="col-md-12">
  {{-- button for showing category creation form --}}
   <div class="create_category">
     <span href="" data-toggle="modal" data-target="#createcategory" class="close-icon btn btn-success" title="">Create New Category</span>
       
   </div>
   {{-- End of create category button --}}

    
    <div class="panel panel-default">
                 
          <div class="panel-heading">
            categories Database
          </div>
          {{-- end of panel heading --}}

      <div class="panel-body">
         
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
                  {{-- end of table head --}}
                  <tbody>
                    @if (count($categories)>0)
                    @foreach ($categories as $category)
                   
                       {{-- expr --}}
                         <tr class="">
                        <td>{{ $category->id }}</td>
                          <td>{{ $category->name }}</td>
                          <td>{{ $category->products->count() }}</td>
                       
                            <td>{{ $category->created_at?$category->created_at->diffForHumans():'no time' }}</td>
                            <td>{{ $category->updated_at?$category->updated_at->diffForHumans():'no time' }}</td>
                            <td>
                {{-- button for category edit --}}
              <span href="" data-toggle="modal" data-target="#editcategory{{ $category->id }}" class="close-icon btn btn-info" title=""><i class="fa fa-edit"></i></span>

         <!-- editcategory Modal Core -->
      <div class="modal fade" id="editcategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editcategory{{ $category->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <h4 class="modal-title text-center" id="editcategory{{ $category->id }}Label">Want to edit The category?</h4>
            <div class="modal-body">
                <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
              {!! Form::model($category,['action'=>['AdminCategoriesController@update',$category->id],'method'=>'put']) !!}

           <div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
             {!! Form::label('name','Category name', []) !!}
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
   {{-- category edit model end --}} 

      {{-- button for delete category--}}
            <span href="" data-toggle="modal" data-target="#deletecategory{{ $category->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>
         <!-- deletecategory Modal Core -->
      <div class="modal fade" id="deletecategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="deletecategory{{ $category->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <h4 class="modal-title text-center" id="deletecategory{{ $category->id }}Label">Want to remove The category?</h4>
            <div class="modal-body">
                <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
              {!! Form::open(['action'=>['AdminCategoriesController@destroy',$category->id],'method'=>'delete','class'=>'sm-form']) !!}
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
   {{-- delete category model end --}} 
                                        

                                         
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{ $categories->links() }}
                                    @else
                                    {{-- if there is no category show this --}}
                                      <tr>
                                        <td>no data</td>
                                        <td>no data</td>
                                        <td>no data</td>
                                        <td>no data</td>
                                        <td>no data</td>
                                      
                                    </tr>
                                   @endif
                                  
                                  



                                </tbody>
                                {{-- end of table body --}}
                            </table>
                        </div>
                    </div>
                </div>
                <!--  end  of panel  -->


      <!-- createcategory Modal Core -->
      <div class="modal fade" id="createcategory" tabindex="-1" role="dialog" aria-labelledby="createcategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <h4 class="modal-title text-center" id="createcategoryLabel">Create New Category?</h4>
            <div class="modal-body">
                <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
             {!! Form::open(['action'=>'AdminCategoriesController@store','method'=>'post']) !!}

            <div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
             {!! Form::label('name','Category name', []) !!}
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
{{-- end of col-md-12 --}}
@endsection
