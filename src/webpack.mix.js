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

mix.js('resources/js/app.js','public/js')
   .js('resources/js/payment.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css')
   .postCss('resources/css/admin.css', 'public/css')
   .postCss('resources/css/auth.css', 'public/css')
   .postCss('resources/css/index.css', 'public/css')
   .postCss('resources/css/interactions.css', 'public/css')
   .postCss('resources/css/item.css', 'public/css')
   .postCss('resources/css/notification.css', 'public/css')
   .postCss('resources/css/paginate.css', 'public/css')
   .postCss('resources/css/payment.css', 'public/css')
   .postCss('resources/css/purchase.css', 'public/css')
   .postCss('resources/css/sanitize.css', 'public/css')
   .postCss('resources/css/sell.css', 'public/css')
   .postCss('resources/css/verify-email.css', 'public/css');
