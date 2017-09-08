const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/app.scss', 'public/css/style.css');
 
 mix.combine([
     "node_modules/bootstrap/dist/css/bootstrap.min.css",
	'public/css/font-awesome.min.css',
	'public/css/sweetalert.css',
	'public/css/material-kit.css',
	'public/css/style.css',
     ], 
    'public/css/app.css'


 );
  mix.combine([
     "node_modules/bootstrap/dist/css/bootstrap.min.css",
	'public/css/font-awesome.min.css',
	
	'public/css/bootstrap-tagsinput.css',
	'public/css/sweetalert.css',
	'public/css/AdminLTE.min.css',
	'public/css/skin-blue.min.css',
	'public/css/material-kit.css',
	'public/css/admin.css',
     ], 
    'public/css/admin_app.css'


 );
 mix.combine([
     "node_modules/jquery/dist/jquery.js", 
     "node_modules/bootstrap/dist/js/bootstrap.min.js", 
    "public/js/jquery.nicescroll.min.js", 
  
    "public/js/material.min.js",  
     "public/js/material-kit.js", 
     "public/js/custom.js", 
     ], 
    'public/js/app.js'


 );
  mix.combine([
     "node_modules/jquery/dist/jquery.js", 
     "node_modules/bootstrap/dist/js/bootstrap.min.js", 
    "public/js/jquery.nicescroll.min.js", 
    "public/js/tinymce/tinymce.min.js",
    "public/js/bootstrap-tagsinput.js",
    
     "public/js/adminlte.min.js", 
      "public/js/material.min.js",  
     "public/js/material-kit.js",
    
     ], 
    'public/js/admin_app.js'


 );
