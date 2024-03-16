<?php

namespace Clinect\NextGen\Laravel;

use Clinect\NextGen\NextGenConnector;
use Saloon\Http\Senders\GuzzleSender;
use Illuminate\Support\ServiceProvider;

class NextGenServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfiguration();
    }

    public function register()
    {
        $this->app->singleton(GuzzleSender::class, fn () => new GuzzleSender);

        $this->app->singleton(NextGenConnector::class, function () {
            return new NextGenConnector;
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
        return sprintf('%s/../../%s', __DIR__, $path);
    }
}
