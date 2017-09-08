<!-- Core Scripts - Include with every page -->

<script src="{{ asset('js/admin_app.js') }}"></script>
{{-- <script src="/js/bootstrap-tagsinput.js"></script>
<script src="/js/tinymce/tinymce.min.js"></script>

<script src="/js/adminlte.min.js"></script>
<script src="/js/material.min.js"></script>
<script src="/js/jquery.nicescroll.min.js"></script> --}}


	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
{{-- <script src="/js/material-kit.js" type="text/javascript"></script> --}}
<script>
	
	  $(document).ready(function() { // makes sure the whole site is loaded
         
             $("html").niceScroll({
               cursorcolor:"#002c53"
        });

              // js for editor
      var editor_config = {
    path_absolute : "/",
    selector: "textarea",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

       tinymce.init(editor_config);
        }); 
</script>

