<?php

namespace Iugu\Tests;


use Illuminate\Database\Schema\Blueprint;
use Iugu\Providers\IuguServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getEnvironmentSetUp($app)
    {
        // parent::getEnvironmentSetUp($app); // TODO: Change the autogenerated stub
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    protected function getPackageProviders($app)
    {

        return [
            IuguServiceProvider::class,
        ];
    }

    /*protected function setUpDatabase($app)
    {
        $app['db']->connection('sqlite')->getSchemaBuilder()->create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('iugu_id')->index()->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('cpf_cnpj')->nullable();
            $table->string('notes')->nullable();
            $table->json('custom_variables')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }*/

}
