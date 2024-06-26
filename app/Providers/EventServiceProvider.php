<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Event;

use App\Events\BookingConfirmed;
use App\Events\BookingCreated;
use App\Listeners\LogVerifiedUser;
use App\Listeners\SendBookingConfirmedNotifications;
use App\Listeners\SendBookingCreatedNotifications;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BookingCreated::class => [
            SendBookingCreatedNotifications::class
        ],
        BookingConfirmed::class => [
            SendBookingConfirmedNotifications::class
        ]
        // Verified::class => [
        //     LogVerifiedUser::class,
        // ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
