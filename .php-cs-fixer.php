<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(['vendor', 'tests\Fixtures'])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12' => true,
    'array_syntax' => ['syntax' => 'short'],
    'ordered_imports' => ['sort_algorithm' => 'length'],
    'no_unused_imports' => true,
])
    ->setUsingCache(false)
    ->setLineEnding(PHP_EOL)
    ->setFinder($finder);
