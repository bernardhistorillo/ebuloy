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

mix.styles([
    'resources/css/admin-style.css',
], 'public/css/admin-all.css')
.styles([
    'resources/css/sidebar/style.css',
    'resources/css/radial-gradient.css',
    'resources/css/style.css',
], 'public/css/all.css')
.scripts([
    'resources/js/admin-script.js',
], 'public/js/admin-all.js')
.scripts([
    'resources/js/sidebar/script.js',
    'resources/js/script.js',
], 'public/js/all.js');
