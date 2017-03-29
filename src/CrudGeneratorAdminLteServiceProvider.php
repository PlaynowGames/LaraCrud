<?php

namespace PlaynowGames\CrudGeneratorAdminLte;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorAdminLteServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator_admin_lte.php' => config_path('crudgenerator_admin_lte.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../publish/app.blade.php' => base_path('resources/views/layouts/app.blade.php'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-generator-admin-lte/'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'PlaynowGames\CrudGeneratorAdminLte\Commands\CrudCommand',
            'PlaynowGames\CrudGeneratorAdminLte\Commands\CrudControllerCommand',
            'PlaynowGames\CrudGeneratorAdminLte\Commands\CrudModelCommand',
            'PlaynowGames\CrudGeneratorAdminLte\Commands\CrudMigrationCommand',
            'PlaynowGames\CrudGeneratorAdminLte\Commands\CrudViewCommand',
            'PlaynowGames\CrudGeneratorAdminLte\Commands\CrudLangCommand'
        );
    }
}
