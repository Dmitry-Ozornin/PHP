<?php

namespace Src\Modules;

class Worker
{
    private MoneyCollectorInterface $collector;
    private int $salaryPerHour;

    public function __construct(MoneyCollectorInterface $collector, int $salaryPerHour = 100)
    {
        $this->collector = $collector;
        $this->salaryPerHour = $salaryPerHour;
    }

    public function work(int $hours)
    {
        $this->collector->earnMoney($this->salaryPerHour * $hours);
    }

    public function goHome(): string
    {
        $collectorResult = $this->collector->withdrawMoney();
        return "Это был тяжелый день. Мы вывели заработанные деньги с сообщением '{$collectorResult}'";
    }
}