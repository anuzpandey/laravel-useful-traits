<?php

namespace AnuzPandey\LaravelUsefulTraits\Tests;

use AnuzPandey\LaravelUsefulTraits\LaravelUsefulTraitsServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'AnuzPandey\\LaravelUsefulTraits\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelUsefulTraitsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-useful-traits_table.php.stub';
        $migration->up();
        */
    }
}
