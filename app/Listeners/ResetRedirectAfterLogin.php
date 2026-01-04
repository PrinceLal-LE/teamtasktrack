<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class ResetRedirectAfterLogin
{
    public function handle(Login $event): void
    {
        $user = $event->user;

        session()->forget('url.intended');

        session(['url.intended' => match (true) {
            $user->hasRole('Admin')     => '/admin',
            $user->hasRole('Team Lead') => '/teamlead',
            $user->hasRole('Developer') => '/developer',
            $user->hasRole('Staff')     => '/staff',
            default => '/',
        }]);
    }
}
