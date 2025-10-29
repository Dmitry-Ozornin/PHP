<?php

namespace App\module;

class QueueProcessor
{
    private Queue $queue;

    public function __construct(Queue $queue)
    {
        $this->queue = $queue;
    }

    public function processQueue(): void
    {
        while (true) {
            $message = $this->queue->getMessage();
            if ($message) {
                echo "Обрабатываем сообщение: $message\n";
                $this->queue->ackLastMessage();
            } else {
                echo "Очередь пуста, ждем...\n";
            }
            sleep(5);
        }
    }
}