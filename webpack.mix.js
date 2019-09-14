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
mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
});

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

/* to cpmplile my css files in one file */
mix.styles([
    'resources/css/libs/blo-post.css',
    'resources/css/libs/bootstrap.css',
    'resources/css/libs/font-awesome.css',
    'resources/css/libs/metisMenu.css',
    'resources/css/libs/sb-admin-2.css'
], 'public/css/libs.css').version();

/* to cpmplile my js files in one file  https://www.larashout.com/laravel-mix */
mix.js([
    'resources/js/libs/jquery.js',
    'resources/js/libs/bootstrap.js',
    'resources/js/libs/metisMenu.js',
    'resources/js/libs/sb-admin-2.js',
    'resources/js/libs/scripts.js'
], 'public/js/libs.js').version();


