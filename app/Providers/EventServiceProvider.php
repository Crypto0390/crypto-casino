<?php

namespace App\Providers;

use App\Events\GamePlayed;
use App\Events\ChatMessageSent;
use App\Events\CommandExecuted;
use App\Listeners\CreateAccount;
use App\Listeners\GameBonus;
use App\Listeners\NotificationSubscriber;
use App\Listeners\SignUpBonus;
use App\Listeners\BroadcastChatMessage;
use App\Listeners\LogExecutedCommand;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Coinbase\CoinbaseExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Steem\SteemExtendSocialite;
use SocialiteProviders\Yahoo\YahooExtendSocialite;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // OAuth
        SocialiteWasCalled::class => [
            YahooExtendSocialite::class,
            SteemExtendSocialite::class,
            CoinbaseExtendSocialite::class
        ],
        Registered::class => [
            CreateAccount::class,
            SignUpBonus::class
        ],
        GamePlayed::class => [
            GameBonus::class
        ],
        ChatMessageSent::class => [
            BroadcastChatMessage::class
        ],
        CommandExecuted::class => [
            LogExecutedCommand::class
        ]
    ];

    protected $subscribe = [
        NotificationSubscriber::class
    ];
}
