<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Competition;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        /* Event::listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add(trans('menu.pages'));

            $items = Competition::all()->map(function (Competition $page) {
                return [
                    'text' => $page['Competitions'],
                    'url' => route('admin.competitions', $page)
                ];
            });

            $event->menu->add($items);
        }); */
    }
}
