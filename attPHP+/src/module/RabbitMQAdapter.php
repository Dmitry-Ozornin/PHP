<?php

namespace App\module;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQAdapter implements Queue
{
    private AMQPStreamConnection $connection;
    private $channel;
    private string $queueName;

    public function __construct(string $host = 'localhost', int $port = 5672, string $user = 'guest', string $password = 'guest', string $queueName = 'events')
    {
        $this->connection = new AMQPStreamConnection($host, $port, $user, $password);
        $this->channel = $this->connection->channel();
        $this->queueName = $queueName;

        $this->channel->queue_declare($this->queueName, false, true, false, false);
    }

    public function sendMessage($message): void
    {
        $msg = new AMQPMessage($message, ['delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT]);
        $this->channel->basic_publish($msg, '', $this->queueName);
    }

    public function getMessage(): ?string
    {
        $msg = $this->channel->basic_get($this->queueName);
        return $msg ? $msg->body : null;
    }

    public function ackLastMessage(): void
    {

    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}