<?php

namespace Src\Modules;

class DummyMoneyCollector implements MoneyCollectorInterface
{
    public function earnMoney(float $amount): void
    {
    }

    public function withdrawMoney(): string
    {
        return '';
    }
}