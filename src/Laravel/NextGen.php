<?php

namespace Clinect\NextGen\Laravel;

use Clinect\NextGen\NextGen as NextGenConnector;

class NextGen extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return NextGenConnector::class;
    }
}
