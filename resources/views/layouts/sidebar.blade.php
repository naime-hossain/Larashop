   <div class="col-md-3 blog-sidebar">
         {{--  <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> --}}
        
       
         
       
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
             
              @endforeach
             
             
           
          </div>
          @endif
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
              @endforeach
             
             
           
          </div>
          @endif
        
          
           
          <div class="sidebar-module">
            <h4>find me</h4>
            <ol class="list-unstyled">
              <li><a href="http://github.com/naime-hossain">GitHub</a></li>
              <li><a href="http://twiiter.com/naime-hossain">Twitter</a></li>
              <li><a href="http://facebook.com/naime-hossain">Facebook</a></li>
            </ol>
          </div>

    
        </div><!-- /.blog-sidebar -->