<?php


namespace App\Suscribers;


use App\Event\IncidenciaEvent;

class IncidenciaSuscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            IncidenciaEvent::SAVED => 'sendMail',
        ];
    }
    public function sendMail(IncidenciaEvent $event)
    {
        echo ('OK');
    }
}