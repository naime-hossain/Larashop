@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All posts</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">

                        <div class="panel-heading">
                          posts Database
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
                                            <th>title</th>
                                            <th>body</th>
                                            <th>photo</th>
                                            <th>author</th>
                                            <th>category</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (count($posts)>0)
                                      @foreach ($posts as $post)
                                     
                                         {{-- expr --}}
                                           <tr class="">
                                          <td>{{ $post->id }}</td>
                                            <td>{{ str_limit($post->title,10) }}</td>
                                            {{-- <td>{{ substr($post->body, 0,20)  }}</td> --}}
                                            <td>{{ str_limit($post->body,10)  }}</td>
                                            <td>
                                             @if ($post->photo)
                                              {{-- expr --}}
                                              <img height="50" width="150" src="/{{ $post->photo?$post->photo->image:''}}" alt="">
                                            @endif
                                            </td>
                                            <td>@if($post->user)
                                      
                                               {{ $post->user->name }}
                                            
                                             @endif</td>
                                            <td>
                                         
                                               {{-- expr --}}
                                               {{ $post->category? $post->category->name:'uncategorized' }}
                                             
                                             </td>
                                        
                                              <td>{{ $post->created_at->diffForHumans() }}</td>
                                              <td>{{ $post->updated_at->diffForHumans() }}</td>
                                            <td>
                                            <a class="btn btn-info" href="{{ route('adposts.edit',$post->id) }}">  <i class="fa fa-edit"></i> 
                                            </a>

                          <span href="" data-toggle="modal" data-target="#deletepost{{ $post->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>
             <!-- deletepost Modal Core -->
          <div class="modal fade" id="deletepost{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="deletepost{{ $post->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="deletepost{{ $post->id }}Label">Want to remove The post?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                  {!! Form::open(['action'=>['AdminPostsController@destroy',$post->id],'method'=>'delete','class'=>'sm-form']) !!}
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
                                        {{ $posts->links() }}
                                        @else
                                          <tr>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data </td>
                                            <td>no data </td>
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
