  @include('layouts.header')

      <div class="welcome_wrap"
    @if ($GeneralSetting->cover_pic)
       style="background-image: url(/images/{{ $GeneralSetting->cover_pic }});"
    @endif
   >
      <div class="welcome_text">
         <div class="container">
         	<div class="row">
         		<div class="col-md-12">
         			@yield('heading')
         		</div>
         	</div>
         </div>
        

     </div>
      </div>
       <div class="body_wrap">
           <div class="container">
         <div class="row main">
          <div class="col-md-12">
             @if(Session::has('message'))
             @include('alert.success')
             @endif

             {{-- alert --}}
              @if ($errors->count()>0)
              @include('alert.error')
            @endif
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
          </div>
         @yield('content') 
  
          @yield('sidebar')  

          </div>
          </div>
       </div>
       
    
 
@include('layouts.footer')
