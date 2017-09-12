   <div class="col-md-3 blog-sidebar">
      {{-- search from --}}
       <div class="sidebar-module">
            <h4>search for product</h4>
        {!! Form::open(['action'=>'HomeController@search','method'=>'get']) !!}
         <div class="input-group">
  
  
  {!! Form::text('key',null, ['class'=>'form-control','placeholder'=>"search key",'required']) !!}
  <span class="input-group-addon">
  {!! Form::button("<i class='fa fa-search fa-fw'></i>", [

  'type'=>'submit','class'=>'btn btn-success']) !!}
  </span>
</div>

        {!! Form::close() !!}
        </div>
         {{-- show categories --}}
           @if (count($categories)>0)
            {{-- expr --}}
          <div class="sidebar-module">
            <h4>Categories</h4>
           

         
              @foreach ($categories as $category)
                <div class="list-group">
                 
                  
                 
                 <a class="list-group-item" href="{{ route('home.archive',['category',$category->name]) }}">
                 {{$category->name." ( ".count($category->products)." ) "}}
                 </a>
                 
                </div>
                {{-- end of list-group --}}
             
              @endforeach
             
             
           
          </div>
            {{-- end of sidebar module --}}
          @endif

          {{-- show the types --}}
           @if (count($types)>0)
            {{-- expr --}}
          <div class="sidebar-module">
            <h4>types</h4>
            

         
              @foreach ($types as $type)
                 <div class="list-group">
               
                   <a class="list-group-item" href="{{ route('home.archive',['type',$type->name]) }}">
                   {{$type->name." ( ".count($type->products)." ) "}}
                   </a>
                 
                 </div>
                 {{-- end of list group --}}
              @endforeach
             
             
           
          </div>
          {{-- end of sidebar module --}}
          @endif
        
          
           
     

    
        </div>
        <!-- /.blog-sidebar -->