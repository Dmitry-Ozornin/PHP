<?php


namespace App\module;

use Src\Modules\Queueable;

class EventSender implements Queueable
{
    private Queue $queue;

    public function __construct(Queue $queue)
    {
        $this->queue = $queue;
    }

    public function send($message): void
    {
        echo "Сохраняем сообщение в очередь: $message\n";
        $this->queue->sendMessage($message);
    }
}