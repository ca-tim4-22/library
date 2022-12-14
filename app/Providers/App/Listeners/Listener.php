<?php

namespace App\Providers\App\Listeners;

use App\Providers\Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Listener
{
    /**
     * Handle the event.
     *
     * @param  \App\Providers\Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
    }
}
