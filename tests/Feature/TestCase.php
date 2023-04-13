<?php

namespace Clinect\NextGen\Tests\Feature;

use Clinect\NextGen\Tests\Stubs\Config;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use Config;
}
