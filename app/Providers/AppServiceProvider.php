<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Events\Dispatcher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if (count(\App\Company::all()) > 0) {
                $event->menu->add('Employee Management');
                $event->menu->add([
                    'text' => 'Employees',
                    'url' => 'admin/employees',
                    'icon' => 'fas fa-fw fa-user',
                ]);
            }
        });
    }
}
