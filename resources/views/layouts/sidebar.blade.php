   <div class="col-md-3 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
        
       
         
       
           @if (count($categories)>0)
            {{-- expr --}}
                  <div class="sidebar-module">
            <h4>Categories</h4>
            <ol class="list-unstyled">

         
              @foreach ($categories as $category)
                {{-- expr --}}
                 <li>
                 <a class="" href="{{ route('home.archive',['category',$category->name]) }}">
                 {{$category->name." ( ".count($category->products)." ) "}}
                 </a>
                 </li>
              @endforeach
             
             
            </ol>
          </div>
          @endif
           @if (count($types)>0)
            {{-- expr --}}
                  <div class="sidebar-module">
            <h4>types</h4>
            <ol class="list-unstyled">

         
              @foreach ($types as $type)
                {{-- expr --}}
                 <li>
                 <a class="" href="{{ route('home.archive',['type',$type->name]) }}">
                 {{$type->name." ( ".count($type->products)." ) "}}
                 </a>
                 </li>
              @endforeach
             
             
            </ol>
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