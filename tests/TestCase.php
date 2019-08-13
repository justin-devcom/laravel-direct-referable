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

        $this->factory = Factory::construct(\Faker\Factory::create(), $pathToFactories);

        Model::unguard();

        Schema::create(config('referral.table_names.directable.table_name'), function ($table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $this->artisan('migrate', [
            '--database' => 'testbench',
            '--realpath' => realpath(__DIR__ . '/../migrations')
        ]);

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
