@include('admin.layouts.header')
        <!--  page-wrapper -->
        <div id="page-wrapper">

          <div class="row">
                <!-- Page Header -->
              @yield('contents')


        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->


    <!-- Page-Level Plugin Scripts-->
    {{-- <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script> --}}
@include('admin.layouts.footer')
@yield('footer')
</body>

</html>
