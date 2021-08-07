const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').sass('resources/css/app.scss', 'public/css');

//Materialized-css
mix.copy('node_modules/materialize-css/dist/css/materialize.min.css', 'public/css');
mix.copy('node_modules/materialize-css/dist/js/materialize.min.js', 'public/js');
mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js');
//images
mix.copy('resources/assets/img', 'public/images');
