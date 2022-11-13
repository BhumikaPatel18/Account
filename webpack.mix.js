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
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

    mix.js('resources/js/account/form.js',
    'public/bundle/js/form.js').sourceMaps();

    mix.js('resources/js/jquery-3.6.0.min.js',
    'public/js/jquery-3.6.0.min.js').sourceMaps();


