<?php

namespace Clinect\NextGen\Laravel;

use Clinect\NextGen\NextGen;
use Illuminate\Support\ServiceProvider;

class NextGenServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfiguration();
    }

    public function register()
    {
        $this->app->bind(NextGen::class, function ($app) {
            return new NextGen(
                clientId: config('clinect.nextgen.client_id'),
                secret: config('clinect.nextgen.secret'),
                siteId: config('clinect.nextgen.site_id'),
                enterpriseId: config('clinect.nextgen.enterprise_id'),
                practiceId: config('clinect.nextgen.practice_id'),
                baseUrl: config('clinect.nextgen.base_url'),
                routeUri: config('clinect.nextgen.route_url')
            );
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
