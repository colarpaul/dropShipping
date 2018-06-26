let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
	'public/bower_components/bootstrap/dist/css/bootstrap-theme.min.css',
	'public/bower_components/bootstrap/dist/css/bootstrap.min.css',
	'public/fontawesome_v5.0.6/web-fonts-with-css/css/fontawesome-all.min.css',
	'public/flagstrap/css/flags.css',
	'public/slick/slick.css',
	'public/slick/slick-theme.css',
	'public/css/main.css'
], 'public/css/main.min.css');