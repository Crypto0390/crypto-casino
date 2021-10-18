<?php

namespace App\Notifications\Admin;

use App\Models\Game;
use Illuminate\Notifications\Messages\MailMessage;

class GameWin extends AdminNotification
{
    protected $game;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Game $game)
    {
        parent::__construct();

        $this->game = $game;
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
            ->subject(__('User won a game'))
            ->greeting(__('Hello'))
            ->line(__('User :name (:email) won :n credits in :game (game :id).', [
                'name'  => $this->game->account->user->name,
                'email' => $this->game->account->user->email,
                'n'     => $this->game->win,
                'game'  => $this->game->title,
                'id'    => $this->game->id,
            ]))
            ->action(__('View game details'), route('backend.games.show', $this->game));
    }
}
