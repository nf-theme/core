<?php

namespace NF\Notification;

use Illuminate\Support\Collection;

class NotificationManager
{
    /**
     * Trigger notification event to user
     *
     * @param Array $receivers
     * @param Notification $notification
     *
     * @return void
     */
    public function send($receivers, $notification)
    {
        $receivers = new Collection($receivers);
        $receivers->each(function ($receiver) use ($notification) {
            $notification->setNotifiable($receiver);
            $notification->execute();
        });
    }

}
