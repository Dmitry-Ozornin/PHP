<?php

require __DIR__ . '/vendor/autoload.php';

use App\module\EventRunner;
use App\module\EventSender;
use App\module\QueueProcessor;
use App\module\RabbitMQAdapter;
use App\module\TgEvents;
use Src\Commands\QueueManagerCommand;

$queue = new RabbitMQAdapter();
$eventSender = new EventSender($queue);
$tgEvents = new TgEvents($eventSender);
$eventRunner = new EventRunner($tgEvents);

// Добавляем сообщения в очередь
$eventRunner->run();

// Запускаем обработчик очереди
$queueProcessor = new QueueProcessor($queue);
$queueManager = new QueueManagerCommand($queueProcessor);
$queueManager->run();