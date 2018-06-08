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

mix.js('resources/assets/js/app.js', 'public/js')
    .copy('resources/assets/js/admin/require.min.js', 'public/js/require.min.js')
    .copy('resources/assets/js/admin/dashboard.js', 'public/js/dashboard.js')
    .copy('resources/assets/js/admin/core.js', 'public/js/core.js')
    .copyDirectory('resources/assets/images', 'public/images')
    .copyDirectory('resources/assets/js/admin/vendors', 'public/js/vendors')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/admin.scss', 'public/css');
