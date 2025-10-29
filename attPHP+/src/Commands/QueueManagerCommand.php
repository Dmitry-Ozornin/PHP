<?php

namespace Src\Commands;

use App\module\QueueProcessor;

class QueueManagerCommand
{
    private QueueProcessor $processor;

    public function __construct(QueueProcessor $processor)
    {
        $this->processor = $processor;
    }

    public function run(): void
    {
        echo "Запуск обработки очереди...\n";
        $this->processor->processQueue();
    }
}