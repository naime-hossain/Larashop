   <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          @if (count($latests)>0)
            {{-- expr --}}
               <div class="sidebar-module">
            <h4>recent posts</h4>
            <ol class="list-unstyled">

            @php
             
              
            @endphp
              @foreach ($latests as $post)
                {{-- expr --}}
                 <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
              @endforeach
             
             
            </ol>
          </div>
          @endif
       
           @if (count($archives)>0)
            {{-- expr --}}
               <div class="sidebar-module">
            <h4>archives</h4>
            <ol class="list-unstyled">

         
              @foreach ($archives as $stats)
                {{-- expr --}}
                 <li>
                 <a class="" href="{{ route('archive.time') }}?month={{$stats['month']}}&year={{$stats['year']}}">
                 {{$stats['month'] .' '. $stats['year'] ." (". $stats['published'] .")"}}
                 </a>
                 </li>
              @endforeach
             
             
            </ol>
          </div>
          @endif
       
           @if (count($categories)>0)
            {{-- expr --}}
                  <div class="sidebar-module">
            <h4>Categories</h4>
            <ol class="list-unstyled">

         
              @foreach ($categories as $category)
                {{-- expr --}}
                 <li>
                 <a class="" href="{{ route('archive.category',$category->name) }}">
                 {{$category->name." ( ".count($category->posts)." ) "}}
                 </a>
                 </li>
              @endforeach
             
             
            </ol>
          </div>
          @endif
        
           @if (count($users)>0)
            {{-- expr --}}
               <div class="sidebar-module">
            <h4>Users</h4>
            <ol class="list-unstyled">

         
              @foreach ($users as $user)
                {{-- expr --}}
                @if ($user->role->name!='administrator' && $user->role->name!='subscriber')
                  {{-- expr --}}
                  <li>
                 <a class="" href="{{ route('archive.author',$user->name) }}">
                 {{$user->name." ( ".count($user->posts)." ) "}}
                 </a>
                 </li>
                @endif
                 
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