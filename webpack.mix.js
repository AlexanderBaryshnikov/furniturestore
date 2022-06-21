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

mix.js('src/js/script.js', 'js')
    .copy('src/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js')
    .copy('src/js/countdon.min.js', 'public/js/countdon.min.js')
    .copy('src/js/jquery.meanmenu.js', 'public/js/jquery.meanmenu.js')
    .copy('src/js/jquery.nicescroll.min.js', 'public/js/jquery.nicescroll.min.js')
    .copy('src/js/jquery.treeview.js', 'public/js/jquery.treeview.js')
    .copy('src/js/jquery-ui.min.js', 'public/js/jquery-ui.min.js')
    .copy('src/js/lightbox.min.js', 'public/js/lightbox.min.js')
    .copy('src/js/plugins.js', 'public/js/plugins.js')
    .copy('src/js/slick.min.js', 'public/js/slick.min.js')
    .copy('src/js/wow.min.js', 'public/js/wow.min.js')
    .copy('src/js/vendor/jquery-3.6.0.min.js', 'public/js/vendor/jquery-3.6.0.min.js')
    .copy('src/js/vendor/jquery-migrate-3.3.2.min.js', 'public/js/vendor/jquery-migrate-3.3.2.min.js')
    .copy('src/js/vendor/modernizr-3.11.2.min.js', 'public/js/vendor/modernizr-3.11.2.min.js')
    .styles([
        'src/css/bootstrap.min.css',
        'src/css/animate.min.css',
        'src/css/default.css',
        'src/css/jquery-ui.css',
        'src/css/lightbox.min.css',
        'src/css/material-design-iconic-font.css',
        'src/css/meanmenu.min.css',
        'src/css/responsive.css',
        'src/css/shortcode.css',
        'src/css/slick.min.css',
        'src/css/style.css',
    ], 'public/css/style.css')
    .copyDirectory('src/img', 'public/img')
    .copyDirectory('src/fonts', 'public/fonts')
    .copyDirectory('src/css/images', 'public/css/images');
