var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.less('app.less', 'resources/assets/css');
    //mix.sass('app.scss', 'resources/assets/css');

    mix.styles([
        'bootstrap.min.css',
        'bootstrap-theme.min.css',
        'flat-ui.min.css',
        'docs.min.css',
        'patch.css',

    ]);

    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'flat-ui.min.js',
        'respond.min.js',
        'html5shiv.js',
        'patch.js',
    ]);

    mix.copy('resources/assets/fonts/', 'public/build/fonts');
    // mix.copy('resources/assets/js/holder.js', 'public/js/holder.js');







    mix.version(['css/all.css', 'js/all.js']);

});
