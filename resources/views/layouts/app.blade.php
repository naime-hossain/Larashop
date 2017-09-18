 {{-- include the header --}}
  @include('layouts.header')

{{-- heading text wrap --}}
      <div class="welcome_wrap"
      {{-- if setting has cover_pic then add it --}}
      @if (isset($GeneralSetting) && $GeneralSetting)
          @if ($GeneralSetting->cover_pic)
       style="background-image: url({{ asset('images/'.$GeneralSetting->cover_pic ) }});"
    @endif
      @endif
   
   >
      <div class="welcome_text">
         <div class="container">
          <div class="row">
            <div class="col-md-12">
             {{-- inject the heading here --}}
              @yield('heading')
            </div>
          </div>
         </div>
        

     </div>
     {{-- end of welcome text --}}
      </div>
      {{-- end of welcome wrap --}}

      {{-- start of the body/main content --}}
       <div class="body_wrap">
             <div class="container">
               <div class="row main">

               {{-- show notifications/alert --}}
                  <div class="col-md-12">
                  {{-- success alert --}}
                     @if(Session::has('message'))
                     @include('alert.success')
                     @endif

                     {{-- error alert --}}
                     @if (isset($errors))
                        @if ($errors->count()>0)
                      @include('alert.error')
                    @endif
                     @endif
                     
                <!-- Include this after the sweet alert js file -->
                @include('sweet::alert')
                  </div>
                  {{-- end o alert/message --}}

                {{-- inhect the content --}}
               @yield('content') 
        
              {{-- inject the sidebar --}}
                @yield('sidebar')  

                </div>
                {{-- end of row --}}
            </div>
            {{-- end of container --}}
       </div>
       {{-- end of body wrap --}}
       
    
 {{-- include the footer --}}
@include('layouts.footer')
