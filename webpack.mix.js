const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
mix.copy('node_modules/summernote/dist/summernote.css', 'public/css/summernote.css');
mix.copy('node_modules/summernote/dist/summernote.js', 'public/js/summernote.js');
mix.copy('node_modules/summernote/dist/font/summernote.woff2', 'public/font/summernote.woff2');
mix.copy('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js', 'public/js/ckeditor.js');
mix.copy('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js.map', 'public/js/ckeditor.js.map');