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

mix.postCss('resources/front/css/main.css', 'public/css');
mix.js('resources/front/js/jquery-3.5.1.js', 'public/js');
mix.copy('resources/front/img', 'public/img');
mix.browserSync('laravel');
