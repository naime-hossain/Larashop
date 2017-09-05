@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All messages</h1>
  </div>
  

  <!--End Page Header -->

          <div class="col-md-3">
          <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{ route('message.index') }}"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right">{{ $messages->count() }}</span></a></li>
             
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

          
             {!! Form::open(['action'=>'AdminMessageController@delete','method'=>'delete']) !!}
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
               
                <div class="btn-group">
                 
                  {!! Form::button("<i class='fa fa-trash-o'></i>", ['class'=>'btn btn-default btn-sm','type'=>'submit']) !!}
             
                </div>
                <!-- /.btn-group -->
             
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  @if ($messages->count()>0)
                    @foreach ($messages as $message)
                      <tr>
                    <td>
                       {!! Form::checkbox('id'.$message->id,$message->id,'', []) !!}
                    </td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="{{ route('message.show',$message->id) }}">{{ $message->name}}</a></td>
                    <td class="mailbox-subject"><b>{{ $message->email }}
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{ $message->created_at->diffForHumans() }}</td>
                  </tr>
                    @endforeach
                    {{ $messages->links() }}
                  @endif
                  
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
         {!! Form::close() !!}
          </div>
          <!-- /. box -->
        </div>
  

    <!--  end  Context Classes  -->
@endsection
