  {{-- start footer wrap --}}
  <div class="footer_wrap ">
      <div class="container">
        <div class="row">
        {{-- show categories if exists --}}
        @if (isset($categories))
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
                    {{-- end of list group--}}
                  </div>
                  {{-- end of col-3 --}}
              @endif
          {{-- end of category list --}}
        @endif
             

          {{-- show social icon if exists --}}
          @if (isset($social))
              @if ($social)
                   <div class="col-md-3">
                     <h4>Our Social identity</h4>
                   <div class="list-group">
                       {{-- facebook --}}
                      @if ($social->facebook)
                          
                             <a class="list-group-item" href="{{ $social->facebook }}">
                             <span class="label"><i class="fa fa-facebook"></i></span> facebook
                             </a>
                             
                       @endif 
                       {{-- twiiter --}}
                          @if ($social->twitter)
                         
                             <a class="list-group-item " href="{{ $social->twitter }}">
                              <span class="label"><i class="fa fa-twitter"></i></span> twitter
                             </a>
                             
                       @endif
                       {{-- linkedin --}}
                          @if ($social->linkedin)
                           
                             <a class="list-group-item " href="{{ $social->linkedin }}">
                              <span class="label"><i class="fa fa-linkedin"></i></span> linkedin
                             </a>
                             
                       @endif 
                       {{-- google plus --}}
                        @if ($social->googlePlus)
                          
                             <a class="list-group-item " href="{{ $social->googlePlus }}">
                              <span class="label"><i class="fa fa-google-plus"></i></span> googlePlus
                             </a>
                              
                       @endif 

                       {{-- instragram --}}
                         @if ($social->instagram)
                          
                             <a class="list-group-item " href="{{ $social->instagram }}">
                              <span class="label"><i class="fa fa-instagram"></i></span> instagram
                             </a>
                              
                       @endif

                       {{-- tumbler --}}
                          @if ($social->tumblr)
                          
                             <a class="list-group-item " href="{{ $social->tumblr }}">
                              <span class="label"><i class="fa fa-tumbler"></i></span> tumbler
                             </a>
                              
                       @endif

                       {{-- whatd app --}}
                              @if ($social->whatsApp)
                          
                             <a class="list-group-item " href="{{ $social->whatsapp }}">
                              <span class="label"><i class="fa fa-whatsapp"></i></span> whatsapp
                             </a>
                              
                       @endif  
                       </div>
                       {{-- end of list-group --}}

                   </div> 
                @endif
                {{-- end of social --}}
          @endif
               
                
      {{-- show types if exists --}}
        @if (isset($types))
            @if ($types->count()>0)
                  <div class="col-md-3">
                      <h4>Products by Types</h4>
                      <div class="list-group">

                        @foreach ($types as $type)
                          
                           <a class="list-group-item" href="{{ route('home.archive',['type',$type->name]) }}">
                           {{$type->name}}
                           </a>
                          
                        @endforeach
                      
                      </div>
                      {{-- end of list group --}}
                  </div>
                  {{-- end of col --}}
              @endif
                {{-- end of type list --}}
          @endif
            
              

          {{-- show pages if exists --}}
          @if (isset($page))
              @if ($page)
                   <div class="col-md-3">
                   <h4>Pages</h4>
                       <div class="list-group">
                       
                       {{-- return policy if exists --}}
                          @if ($page->returnPolicy)
                              
                                 <a class="list-group-item" href="{{ route('returnPolicy') }}">
                                  return policy
                                 </a>
                                 
                           @endif 
                           {{-- terms and condition if exists --}}
                             @if ($page->termsAndConditions)
                              
                                 <a class="list-group-item" href="{{ route('terms&conditions') }}">
                                  Term and Conditions
                                 </a>
                                 
                           @endif
                            {{--  contact us--}}
                             @if ($page->contactUs)
                              
                                 <a class="list-group-item" href="{{ route('contact') }}">
                                  Contact Us
                                 </a>
                                 
                           @endif 
                        </div> 
                        {{-- end of list group --}}
                    </div>
                    {{-- end of col --}}
                @endif 
          @endif
               
               
        </div>
        {{-- end of row --}}
      </div>
      {{-- end of container --}}
    </div>
    {{-- end of footer wrap --}}


    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>
   
    {{--  <script src="/js/jquery-2.1.1.min.js">
    </script>  --}}
    {{--  <script src="/js/jquery.nicescroll.min.js">
    </script> 
        <script src="/js/material.min.js"></script> --}}
   
     @yield('extra_footer')

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    {{-- <script src="/js/material-kit.js" type="text/javascript"></script>
    <script src="/js/custom.js" type="text/javascript"></script> --}}
    @yield('script')
</body>
</html>
