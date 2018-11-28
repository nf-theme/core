<?php

namespace NF\Notification\Facades;

use Illuminate\Support\Facades\Facade;

class Notification extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new \NF\Notification\NotificationManager;
    }
}
