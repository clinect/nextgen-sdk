<?php

namespace Clinect\NextGen\Laravel;

use Clinect\NextGen\NextGen;
use Clinect\NextGen\NextGenConfig;
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

        $this->app->bind(NextGen::class, function ($app) {
            $config = NextGenConfig::create([
                'client_id' => config('clinect.nextgen.client_id'),
                'secret' => config('clinect.nextgen.secret'),
                'site_id' => config('clinect.nextgen.site_id'),
                'enterprise_id' => config('clinect.nextgen.enterprise_id'),
                'practice_id' => config('clinect.nextgen.practice_id'),
                'base_url' => config('clinect.nextgen.base_url'),
                'route_uri' => config('clinect.nextgen.route_uri'),
                'auth_uri' => config('clinect.nextgen.auth_uri'),
                'cache_adapter' => config('clinect.nextgen.cache_adapter'),
            ]);

            return new NextGen($config);
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
