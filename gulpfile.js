// const elixir = require('laravel-elixir');
//
// require('laravel-elixir-vue-2');
//
// /*
//  |--------------------------------------------------------------------------
//  | Elixir Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Elixir provides a clean, fluent API for defining some basic Gulp tasks
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for your application as well as publishing vendor resources.
//  |
//  */
//
var elixir = require('laravel-elixir'),
    gulp = require('gulp'),
    php = require('gulp-connect-php');
require('laravel-elixir-js-uglify');
elixir.config.notifications = false;

// elixir.extend('test', function() {
//     return gulp.task('tester', function() {
//         elixir((mix) => {
//             mix.phpUnit();
//             mix.phpSpec();
//         });
//     });
// });
elixir((mix) => {
    mix.less('app.less', 'public/css/app_less.css');
    mix.less('less/AdminLTE.less', "public/css/admin_lte.css");
    mix.less('less/skins/_all-skins.less', "public/css/admin_skins.css");
    mix.coffee('../coffee/StoreCamp.coffee', 'public/js/admin.js');
    mix.uglify('admin.js', 'public/js', 'resources/assets/js/admin.js');
    mix.coffee('../coffee/main.coffee', 'public/js/app.js');
    mix.coffee('../coffee/modules/*.coffee', 'public/js/modules.js');
    mix.sass('../sass/app.scss', 'public/css/main/app.css');
    mix.browserSync({
        proxy: 'storecamp.app'
    });
});
// create a task to serve the app
gulp.task('serve', function() {

    // start the php server
    // make sure we use the public directory since this is Laravel
    php.server({
        base: './public'
    });

});



/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */


//elixir(function(mix) {
//    mix.copy('fonts/', 'public/fonts/');
//});