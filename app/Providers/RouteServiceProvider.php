<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Member;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Models\Category;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //category
        Route::pattern('caid', '[0-9]+');
        Route::bind('catid', function ($catid) {
            return Category::where('catid', $catid)->firstOrFail();
        });

        //brand
        Route::pattern('brandid', '[0-9]+');
        Route::bind('brandid', function($brandid){
           return Brand::where('brandid', $brandid)->firstOrFail();
        });

        //member
        Route::pattern('userid', '[0-9]+');
        Route::bind('userid', function($userid){
            return Member::where('userid', $userid)->firstOrFail();
        });

        parent::boot();


    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
