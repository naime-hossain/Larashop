@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All categories</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">

                        <div class="panel-heading">
                          categories Database
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
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (count($categories)>0)
                                      @foreach ($categories as $category)
                                     
                                         {{-- expr --}}
                                           <tr class="">
                                          <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                         
                                              <td>{{ $category->created_at?$category->created_at->diffForHumans():'no time' }}</td>
                                              <td>{{ $category->updated_at?$category->updated_at->diffForHumans():'no time' }}</td>
                                            <td>
                                            <a class="btn btn-info" href="{{ route('categories.edit',$category->id) }}">  <i class="fa fa-edit"></i> 
                                            </a>

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
       {{-- model end --}} 
                                            

                                             {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{ $categories->links() }}
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
@endsection
