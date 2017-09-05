@include('admin.layouts.header2')
  <div class="content-wrapper">

      <section class="content-header">
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
          @yield('contents')


        </div>
    
    </section>

    </div>
    <!-- end wrapper -->


    <!-- Page-Level Plugin Scripts-->
    {{-- <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script> --}}
@include('admin.layouts.footer2')
@yield('footer')
</body>

</html>
