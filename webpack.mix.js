const mix = require("laravel-mix");
const glob = require("glob");
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

mix.js("resources/js/app.js", "public/js");
glob.sync("resources/scss/*/*.scss").map(function (file) {
    mix.sass(file, "public/css");
});
