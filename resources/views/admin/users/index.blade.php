@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All Users</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
                     <!--    Context Classes  -->
<div class="panel panel-default">

<div class="panel-heading">
Users Database
</div>

<div class="panel-body">

<div class="table-responsive">
  <table class="table">
      <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>image</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
       @if (count($users)>0)
        @foreach ($users as $user)
          <tr class="{{$user->is_active==1?'success':'warning' }}">
            <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>
              @if ($user->photos->count()>0)

               
                     <img height="50" width="150" class="img-rounded" src="{{ asset('images/users/'.$user->photos()->first()->path) }}" alt="">
               
               

            

             @endif

              </td>
              <td>{{ $user->email }}</td>
              <td> @if($user->role){{ $user->role->name }}@endif</td>
              
            <td>  {{$user->is_active==1?'Active':'Not Active' }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
              <td>
              <a class="btn btn-info" href="{{ route('users.edit',$user->id) }}">  <i class="fa fa-edit"></i> 
              </a>

              <span href="" data-toggle="modal" data-target="#deleteuser{{ $user->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>
             <!-- deleteuser Modal Core -->
          <div class="modal fade" id="deleteuser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteuser{{ $user->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="deleteuser{{ $user->id }}Label">Want to remove The user?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                  {!! Form::open(['action'=>['AdminUsersController@destroy',$user->id],'method'=>'delete','class'=>'sm-form']) !!}
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
                    {{ $users->links() }}
                    @endif



                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <!--  end  Context Classes  -->
@endsection
