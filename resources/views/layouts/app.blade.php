  @include('layouts.header')

    <div class="welcome_wrap">
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
         <div class="row">
          <div class="col-md-12">
             @if(Session::has('message'))
                           @include('alert.success')
                           @endif
          </div>
         @yield('content') 
  
          @yield('sidebar')  

          </div>
          </div>
       </div>
       
    
 
@include('layouts.footer')
@yield('footer')