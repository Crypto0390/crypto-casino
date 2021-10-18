<?php

namespace App\Notifications\Admin;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;

class NewUser extends AdminNotification
{
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Authenticatable $game)
    {
        parent::__construct();

        $this->user = $game;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__('New user signed up'))
            ->greeting(__('Hello'))
            ->line(__('New user :name (:email) has just signed up.', ['name' => $this->user->name, 'email' => $this->user->email]))
            ->action(__('View user'), route('backend.users.edit', $this->user));
    }
}
