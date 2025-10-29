<?php

namespace App\module;

class TgEvents
{
    private EventSender $eventSender;

    public function __construct(EventSender $eventSender)
    {
        $this->eventSender = $eventSender;
    }

    public function processEvent(string $event): void
    {
        echo "Добавляем событие в очередь: $event\n";
        $this->eventSender->send($event);
    }
}