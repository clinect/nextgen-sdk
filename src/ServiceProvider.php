<?php

namespace Clinect\NextGen;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->registerConfiguration();
    }

    public function register()
    {
        $this->app->singleton('nextgen', function ($app) {
            return new NextGenSdk;
        });
    }

    public function providers()
    {
        return ['nextgen'];
    }

    protected function registerConfiguration()
    {
        $this->mergeConfigFrom($this->packagePath('config/nextgen.php'), 'clinect.nextgen');

        $this->publishes([
            $this->packagePath('config/nextgen.php') => config_path('clinect/nextgen.php'),
        ], 'nextgen-config');
    }

    protected function packagePath($path = '')
    {
        return sprintf('%s/../%s', __DIR__, $path);
    }
}
