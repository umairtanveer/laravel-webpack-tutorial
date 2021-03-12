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

mix.js('resources/js/app.js', 'public/js')

    // CLIENT JS LINKS
    .js('resources/js/front/custom.js', 'public/js/front')
    .js('resources/js/front/ajax-request-helpers.js', 'public/js/front')
    .js('resources/js/front/task1/todo.js', 'public/js/front/task1')

    // ADMIN JS LINKS
    .js('resources/js/admin/custom.js', 'public/js/admin')





    // GLOBAL CSS
    .postCss('resources/css/app.css', 'public/css')

    // FRONT SITE CSS LINKS
    .postCss('resources/css/front/custom.css', 'public/css/front')

    // ADMIN CSS CSS LINKS
    .postCss('resources/css/admin/custom.css', 'public/css/admin')
;
