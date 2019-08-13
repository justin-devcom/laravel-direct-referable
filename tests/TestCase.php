<?php

namespace Jxclsv\Referable\Tests;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Jxclsv\Referable\DirectReferralServiceProvider;
use Jxclsv\Referable\Models\User;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected $user;

    protected $factory;

    protected function getPackageProviders($app)
    {
        return [DirectReferralServiceProvider::class];
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $pathToFactories = realpath(__DIR__ . '/../database/factories');

        parent::setUp();

        $this->withFactories(__DIR__ . '/../database/factories');

        Model::unguard();

        $this->loadLaravelMigrations(['--database' => 'testbench']);
        $this->artisan('migrate', [
            '--database' => 'testbench',
            '--realpath' => realpath(__DIR__ . '/../migrations')
        ])->run();

        $this->createTestUser();
    }

    public function createTestUser()
    {
        $this->user =  User::create([
            'name' => 'tester',
            'email' => 'tester@tester.com',
            'password' => bcrypt('tester')
        ]);
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application   $app
     *
     * @return void
     */
    protected function getEnvironmentSetup($app)
    {
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => ''
        ]);

        $app['config']->set('app.key', 'base64:0cQUyrGdqHnZr34c8Bk3268LBrDTQvbBEqbzPXwVp34=');
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        Schema::drop('users');
    }
}
