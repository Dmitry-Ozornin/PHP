<?php


namespace App\module;

class EventRunner
{
    private TgEvents $tgEvents;

    public function __construct(TgEvents $tgEvents)
    {
        $this->tgEvents = $tgEvents;
    }

    public function run(): void
    {
        $events = ["Сообщение 1", "Сообщение 2", "Сообщение 3"];
        foreach ($events as $event) {
            $this->tgEvents->processEvent($event);
        }
    }
}