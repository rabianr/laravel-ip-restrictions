<?php

namespace Rabianr\Access;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'iprestrictions');
    }

    /**
     * Register the config for publishing
     *
     * @param  Router  $router
     */
    public function boot(Router $router)
    {
        $this->publishes([$this->configPath() => config_path('iprestrictions.php')], 'iprestrictions');

        $router->aliasMiddleware('iprestrictions', HandleIpRestrictions::class);
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function configPath()
    {
        return dirname(__DIR__) . '/config/iprestrictions.php';
    }
}
