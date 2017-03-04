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

//TODO Create __buildStyles function

const __buildScripts = (mix) => {
    mix.scripts([
        './public/custom_vendors/jQuery/jQuery-2.1.4.min.js',
        './public/plugins/moment/moment.js',
        './public/js/bootstrap.js',
        './public/custom_vendors/site_sidebar/modernizr.js',
        './public/plugins/fastclick/lib/fastclick.js',
        './public/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        './public/plugins/iCheck/icheck.min.js',
        './public/plugins/summernote/dist/summernote.min.js',
        './public/plugins/plyr/dist/plyr.js',
        './public/plugins/dropzone/dist/dropzone.js',
        './public/plugins/select2/dist/js/select2.full.min.js',
        './public/custom_vendors/input-mask/jquery.inputmask.js',
        './public/custom_vendors/input-mask/jquery.inputmask.date.extensions.js',
        './public/custom_vendors/input-mask/jquery.inputmask.extensions.js',
        './public/plugins/bootstrap-daterangepicker/daterangepicker.js',
        './public/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        './public/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
        './public/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js',
        './public/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        './public/plugins/iCheck/icheck.min.js',
        './public/plugins/fastclick/lib/fastclick.js',
        './public/plugins/bower-jquery-sparkline/dist/jquery.sparkline.retina.js',
        './public/custom_vendors/jvectormap/jquery-jvectormap-1.2.2.min.js',
        './public/custom_vendors/jvectormap/jquery-jvectormap-world-mill-en.js',
        './public/plugins/chart.js/Chart.js',
        './public/plugins/morris.js/morris.min.js',
        './public/plugins/toastr/toastr.js',
        './public/plugins/jquery-bar-rating/dist/jquery.barrating.min.js',
        './public/plugins/magnific-popup/dist/jquery.magnific-popup.min.js',
        './public/plugins/datatables.net/js/jquery.dataTables.min.js',
        './public/custom_vendors/site_sidebar/jquery.menu-aim.js'
    ], 'public/js/plugins.js');

    mix.uglify('./public/js/plugins.js', './public/js/min');

    mix.scripts([
        './public/js/admin.js',
        './public/js/app.js'
    ], 'public/js/storecamp.js');

    mix.uglify('./public/js/storecamp.js', './public/js/min');
};

elixir((mix) => {
    mix.less('app.less', 'public/css/app_less.css');
    mix.less('less/AdminLTE.less', "public/css/admin_lte.css");
    mix.less('less/skins/_all-skins.less', "public/css/admin_skins.css");
    mix.coffee('../coffee/StoreCamp.coffee', 'public/js/admin.js');
    mix.uglify('admin.js', 'public/js', 'resources/assets/js/admin.js');
    mix.coffee('../coffee/main.coffee', 'public/js/app.js');
    mix.coffee('../coffee/modules/*.coffee', 'public/js/modules.js');
    mix.sass('../sass/app.scss', 'public/css/main/app.css');
    __buildScripts(mix);
    mix.browserSync({
        proxy: 'storecamp.dev'
    });
});


// create a task to serve the app
gulp.task('serve', function () {

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