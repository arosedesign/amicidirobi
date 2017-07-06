const { mix } = require('laravel-mix');
const CleanWebpackPlugin = require('clean-webpack-plugin');

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
   .sass('resources/assets/sass/app.scss', 'public/css')
   .version();

mix.styles([
    'resources/assets/css/summernote.css',
    'public/css/app.*.css'
], 'public/css/admin.css');

mix.scripts([
    'public/js/app.*.js',
    'resources/assets/js/summernote.min.js',
    'resources/assets/js/summernote-it-IT.js'
], 'public/js/admin.js');

mix.browserSync('admin.gliamicidirobi');

mix.webpackConfig({
    plugins: [
        new CleanWebpackPlugin(['./public/js', './public/css'])
    ]
});