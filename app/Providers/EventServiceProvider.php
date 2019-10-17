<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Message;
use App\Models\DetailShopping;
use App\Observers\UserObserver;
use App\Observers\MessageObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Observers\DetailShoppingObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [Registered::class               => [SendEmailVerificationNotification::class],
                         'Illuminate\Auth\Events\Logout' => ['App\Listeners\LogSuccessfulLogout'], ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        User::observe(UserObserver::class);
        Message::observe(MessageObserver::class);
        DetailShopping::observe(DetailShoppingObserver::class);

        //
    }
}
