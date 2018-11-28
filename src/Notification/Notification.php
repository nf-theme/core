<?php

namespace NF\Notification;

class Notification
{
    public function __construct()
    {

    }

    public function setNotifiable($notifiable)
    {
        $this->notifiable = $notifiable;
    }

    public function executeEmailTask()
    {
        $this->toMail($this->notifiable)->send();
    }
    
    public function execute()
    {
        $methods = $this->via();

        foreach ($methods as $method) {
            switch ($method) {
                case 'mail':
                    $this->executeEmailTask();
                    break;

                default:
                    break;
            }
        }
    }
}
