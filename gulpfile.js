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
    mix.sass('app.scss');



    mix.styles([

    	'bootstrap.css',
    	'bootstrap-theme.css',
    	'normalize.css',
        'select2.css',
        'jquery.rondell.css',
        'coin-slider-styles.css',
        'style.css',
        'style2',
        'slide.css',
        'font.css',
        'dropzone.css',
    	'app.css',
        'alertify.core.css',
        'alertify.default.css',
        'menu.css',
        'admin.menu.css',
        'font-awesome.min.css'




    	], 'public/css', 'public/css/vendor');


    mix.scripts([

    	'jquery.js',
    	'bootstrap.js',
        'select2.js',
        'jquery.mousewheel-3.0.6.min.js',
        'modernizr-2.0.6.min.js',
        'jquery.rondell.js',
        'jquery.scrollTo.js',
        'jquery.parallax.js',
        'jquery.mousewheel.js',
        'jquery.localscroll.js',
        'slide.js',
        'jquery.scrollex.js',
        'jquery.scrolly.js',
        'skel.js',
        'util.js',
        'dropzone.js',
        'coin-slider.js',
        'alertify.js',
        'canvas.js',
        'menu.js',
        'admin.menu.js',
        'moments.js'

    	], 'public/js', 'public/js/vendor');

});
