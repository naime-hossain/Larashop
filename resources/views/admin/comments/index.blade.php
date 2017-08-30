@extends('admin.layouts.admin')

@section('contents')
 <section class="content-header">
  <div class="col-lg-12">
      <h1 class="page-header">All comments</h1>
  </div>
  </section>
  <!--End Page Header -->

  <div class="col-md-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">

                        <div class="panel-heading">
                          comments Database
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
                                            <th>User name</th>
                                            <th>Created At</th>
                                            <th>body</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (count($comments)>0)
                                      @foreach ($comments as $comment)
                                     
                                         {{-- expr --}}
                                           <tr class="">
                                          <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->user->name }}</td>
                                         
                                              <td>{{ $comment->created_at?$comment->created_at->diffForHumans():'no time' }}</td>
                                              <td>{{ $comment->body }}</td>
                                            <td>
                <span href="" data-toggle="modal" data-target="#deletecomment{{ $comment->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>
             <!-- deletecomment Modal Core -->
          <div class="modal fade" id="deletecomment{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="deletecomment{{ $comment->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="deletecomment{{ $comment->id }}Label">Want to remove The comment?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                  {!! Form::open(['action'=>['AdminCommentsController@destroy',$comment->id],'method'=>'delete','class'=>'sm-form']) !!}
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
                                        {{ $comments->links() }}
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
