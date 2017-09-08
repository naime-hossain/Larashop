  @php
  // import the carbon class to show time
  use Carbon\Carbon;
 
@endphp

@extends('admin.layouts.admin')


{{-- start the contents --}}
@section('contents')
  <div class="col-lg-12">
      
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
                <li class="active"><a href=" {{ route('message.index') }}"><i class="fa fa-inbox"></i> Inbox
                  </a></li>
                
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

            </div>
            <!-- /.box-header -->
                  <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>Message Subject Is Placed Here</h3>
                <h5>From: {{ $message->email }}
                  <span class="mailbox-read-time pull-right">{{ trim(Carbon::parse($message->created_at)->format('d-m-y')) }}</span></h5>
              </div>
              <!-- /.mailbox-read-info -->
     
              <div class="mailbox-read-message">
                <p>Hello Admin</p>

              {{ $message->message }}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
         
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
            
              </div>
             {{-- form for delete message --}}
                 {!! Form::open(['action'=>['AdminMessageController@destroy',$message->id],'method'=>'delete']) !!}
             {!! Form::button("<i class='fa fa-trash-o'></i> Delete", ['class'=>'btn btn-danger','type'=>'submit']) !!}
             {!! Form::close() !!}
              
            </div>
           
          <!-- /. box -->
        </div>
  

    <!--  end  Context Classes  -->
@endsection
