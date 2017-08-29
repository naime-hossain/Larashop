    <div class="footer_wrap ">
    	<div class="container">
    		<div class="row">
              @if ($categories->count()>0)
                  <div class="col-md-3">
                      <h4>Products by categories</h4>
            <div class="list-group">


              @foreach ($categories as $category)

                 
                 <a class="list-group-item" href="{{ route('home.archive',['category',$category->name]) }}">
                 {{$category->name}}
                 </a>
                 
              @endforeach
             
             
            </div>
                  </div>
              @endif
    			{{-- end of category list --}}
                @if ($social)
                   <div class="col-md-3">
                   <h4>Our Social identity</h4>
                   <div class="list-group">
                   
                   
                   
                      @if ($social->facebook)
                          
                             <a class="list-group-item" href="{{ $social->facebook }}">
                             <span class="label"><i class="fa fa-facebook"></i></span> facebook
                             </a>
                             
                       @endif 
                          @if ($social->twitter)
                         
                             <a class="list-group-item " href="{{ $social->twitter }}">
                              <span class="label"><i class="fa fa-twitter"></i></span> twitter
                             </a>
                             
                       @endif
                          @if ($social->linkedin)
                           
                             <a class="list-group-item " href="{{ $social->linkedin }}">
                              <span class="label"><i class="fa fa-linkedin"></i></span> linkedin
                             </a>
                             
                       @endif 
                        @if ($social->googlePlus)
                          
                             <a class="list-group-item " href="{{ $social->googlePlus }}">
                              <span class="label"><i class="fa fa-google-plus"></i></span> googlePlus
                             </a>
                              
                       @endif 
                         @if ($social->instagram)
                          
                             <a class="list-group-item " href="{{ $social->instagram }}">
                              <span class="label"><i class="fa fa-instagram"></i></span> instagram
                             </a>
                              
                       @endif
                          @if ($social->tumblr)
                          
                             <a class="list-group-item " href="{{ $social->tumblr }}">
                              <span class="label"><i class="fa fa-tumbler"></i></span> tumbler
                             </a>
                              
                       @endif
                              @if ($social->whatsApp)
                          
                             <a class="list-group-item " href="{{ $social->whatsapp }}">
                              <span class="label"><i class="fa fa-whatsapp"></i></span> whatsapp
                             </a>
                              
                       @endif  
                       </div>

                   </div> 
                @endif
                {{-- end of social --}}
                

            @if ($categories->count()>0)
                  <div class="col-md-3">
                      <h4>Products by Types</h4>
            <div class="list-group">

              @foreach ($types as $type)
                {{-- expr --}}
                
                 <a class="list-group-item" href="{{ route('home.archive',['type',$type->name]) }}">
                 {{$type->name}}
                 </a>
                
              @endforeach
             
             
            </div>
                  </div>
              @endif
                {{-- end of type list --}}

                @if ($page)
                   <div class="col-md-3">
                   <h4>Pages</h4>
                   <div class="list-group">
                   
                   
                   
                      @if ($page->returnPolicy)
                          
                             <a class="list-group-item" href="{{ $page->returnPolicy }}">
                              return policy
                             </a>
                             
                       @endif 
                         @if ($page->termsAndConditions)
                          
                             <a class="list-group-item" href="{{ $page->returnPolicy }}">
                              Term and Conditions
                             </a>
                             
                       @endif 
                         @if ($page->contactUs)
                          
                             <a class="list-group-item" href="{{ $page->returnPolicy }}">
                              Contact Us
                             </a>
                             
                       @endif 
                    </div> 
                    </div>
                @endif
               
    		</div>
    	</div>
    </div>
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
   
    {{--  <script src="/js/jquery-2.1.1.min.js">
    </script>  --}}
     <script src="/js/jquery.nicescroll.min.js">
    </script> 
        <script src="/js/material.min.js"></script>
   
     @yield('extra_footer')

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="/js/material-kit.js" type="text/javascript"></script>
    <script src="/js/custom.js" type="text/javascript"></script>
    @yield('script')
</body>
</html>
