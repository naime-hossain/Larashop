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

          
        <div class="col-md-9 col-md-offset-1">
         {!! Form::open(['action'=>'AdminMessageController@sendmessage','method'=>'post']) !!}
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
           
            <div class="box-body">
              <div class="form-group">
                
                {!! Form::text('to',isset($message)?$message->email:null, ['class'=>'form-control','placeholder'=>'To:']) !!}
              </div>
              <div class="form-group">
                
                {!! Form::text('subject',null, ['class'=>'form-control','placeholder'=>'Subject:']) !!}
              </div>
              <div class="form-group">
                    
                    {!! Form::textarea('message',null, ['class'=>'from-control','placeholder'=>'To:','id'=>'compose-textarea','rows'=>15]) !!}

              </div>
           
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
              
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
              
            </div>
            <!-- /.box-footer -->
          </div>
          {!! Form::close() !!}
          <!-- /. box -->
        </div>
        <!-- /.col -->

    <!--  end  Context Classes  -->
@endsection
