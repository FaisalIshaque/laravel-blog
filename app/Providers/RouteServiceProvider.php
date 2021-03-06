<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        //$router->model('articles', 'App\article');

        //the above will apply globaly to all articles *see below*,
        //but we can overwrite the functionality for a specific purpose with a closure.
        /*
            $router->bind('articles', function($id)
            {
                return \App\article::published()->findorfail($id);
            });
        */

        //**to find the articles which have been published only
        $router->bind('articles', function($id)
        {
            return \App\article::published()->findOrFail($id);
        });

        $router->bind('tags', function($name)
        {
            return \App\tag::where('name', $name)->firstOrFail();
        });

        //$router->model('tags', 'App\tag');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
