    <div class="footer_wrap ">
    	<div class="container">
    		<div class="row">
    			<h4 class="panel text-center">Design And Developed By <a href="http://naimehossain.com" title="">Naime Hossain</a></h4>
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
