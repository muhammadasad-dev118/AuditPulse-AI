<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class SetTenantIdInSession
{
    public function handle(Login $event): void
    {
        if ($event->user->tenant_id) {
            session(['tenant_id' => $event->user->tenant_id]);
        }
    }
}