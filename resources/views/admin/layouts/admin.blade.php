{{-- include the header where all css and the menu exists --}}
@include('admin.layouts.header2')
  <div class="content-wrapper">

      <section class="content-header">
      {{-- heading of all page --}}
       @yield('heading')
      </section>
    <section class="content container-fluid">

         <div class="row">
         <div class="col-md-8 col-md-offset-2">
      <!-- Include this after the sweet alert js file -->
        @include('sweet::alert')
        {{-- success alert --}}
         @if(Session::has('message'))
         @include('alert.success')
         @endif
           {{-- alert --}}
             @if (isset($errors))
                @if ($errors->count()>0)
              @include('alert.error')
            @endif
             @endif
         </div>
         {{-- end of alert --}}
   
     <!-- Page Header -->

     {{-- the main content for all pages inject here --}}
          @yield('contents')


        </div>
    
    </section>

    </div>
    <!-- end wrapper -->

{{-- include the footer where all js exists --}}
@include('admin.layouts.footer2')
{{-- extra js for page lavel --}}
@yield('footer')
</body>

</html>
