<?php

namespace App\Listeners;

use App\Events\GamePlayed;
use App\Models\User;
use App\Notifications\Admin\GameLoss;
use App\Notifications\Admin\GameWin;
use App\Notifications\Admin\NewUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Notification;

class NotificationSubscriber
{
    private $adminEmail;

    public function __construct()
    {
        $this->adminEmail = config('settings.notifications.admin.email');
    }

    public function sendEmailVerificationLink(Registered $event)
    {
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
            $event->user->sendEmailVerificationNotification();
        }
    }

    public function sendNewUserAdminNotification(Registered $event)
    {
        if (!$event->user->hasRole(User::ROLE_BOT)) {
            Notification::route('mail', $this->adminEmail)
                ->notify(new NewUser($event->user));
        }
    }

    public function sendGameWinAdminNotification(GamePlayed $event)
    {
        if ($event->game->win >= config('settings.notifications.admin.game.win.treshold')) {
            Notification::route('mail', $this->adminEmail)
                ->notify(new GameWin($event->game));
        }
    }

    public function sendGameLossAdminNotification(GamePlayed $event)
    {
        if ($event->game->win < $event->game->bet && abs($event->game->net_win) >= config('settings.notifications.admin.game.loss.treshold')) {
            Notification::route('mail', $this->adminEmail)
                ->notify(new GameLoss($event->game));
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        // user notifications
        if (config('settings.users.email_verification')) {
            $events->listen(Registered::class, self::class . '@sendEmailVerificationLink');
        }

        // admin notifications
        if ($this->adminEmail) {
            if (config('settings.notifications.admin.registration.enabled')) {
                $events->listen(Registered::class, self::class . '@sendNewUserAdminNotification');
            }

            if (config('settings.notifications.admin.game.win.enabled')) {
                $events->listen(GamePlayed::class, self::class . '@sendGameWinAdminNotification');
            }

            if (config('settings.notifications.admin.game.loss.enabled')) {
                $events->listen(GamePlayed::class, self::class . '@sendGameLossAdminNotification');
            }
        }
    }
}
