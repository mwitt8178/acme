var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.less('app.less')
    mix.version(["public/assets/stylesheets/styles.css", "public/assets/scripts/frontend.js"]);
    mix.copy('bower_components/bootstrap/dist/fonts', 'public/assets/fonts');
    mix.copy('bower_components/font-awesome/fonts', 'public/assets/fonts');
    mix.styles([
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'bower_components/font-awesome/css/font-awesome.css',
        'resources/css/sb-admin-2.css',
        'resources/css/timeline.css',
        'resources/css/animate.css',
        'bower_components/datatables/media/css/dataTables.bootstrap.css',
        'bower_components/datatables/media/css/dataTables.jqueryui.css',
        'bower_components/datatables/media/css/jquery.dataTables.css',
    ], 'public/assets/stylesheets/styles.css', './');
    mix.scripts([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'bower_components/Chart.js/dist/Chart.js',
        'bower_components/metisMenu/dist/metisMenu.js',
        'resources/js/sb-admin-2.js',
        'bower_components/datatables/media/js/jquery.dataTables.js',
        'bower_components/datatables/media/js/dataTables.bootstrap.js',
        'bower_components/datatables/media/js/dataTables.jqueryui.js',
        'resources/js/frontend.js'
    ], 'public/assets/scripts/frontend.js', './');
});

