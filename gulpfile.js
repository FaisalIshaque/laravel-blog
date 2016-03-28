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
    

	mix.sass('app.scss', 'public/css');

    mix.styles([
    	'/libs/bootstrap.min.css',
    	'/libs/select2.min.css',
    	]);

    mix.scripts([
    	'/libs/jquery.js',
    	'/libs/select2.min.js',
     	]);

    	//the second argument 'null' is the ouput directory.file
    	//the third output 'public/css' is the base directory

   // mix.version('public/css/all.css');

  //  mix.phpUnit();
});
