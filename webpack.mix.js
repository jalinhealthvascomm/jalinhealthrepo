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

const config = require("./webpack.config"); 
mix.setPublicPath('./');
mix.webpackConfig(config);

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        // tailwinds css
        require("tailwindcss"),
    ]);
    
mix.js('resources/js/alpin.js', 'public/js');
mix.js('resources/js/globalfunc.js', 'public/js');
mix.js('resources/js/tw-elements.umd.min.js', 'public/js')
mix.js('resources/js/axios.js', 'public/js')
    
mix.sass('public/assets/scss/soft-ui-dashboard.scss', 'public/assets/css');
mix.sass('resources/css/admin/soft-ui-custom.scss', 'public/assets/css');
    // scss
mix.sass('resources/scss/main.scss', 'public/css');

mix.js("resources/js/resources.js", "public/js")
    .vue({ version: 3 });

mix.webpackConfig({
    stats: {
        children: true,
    },
});