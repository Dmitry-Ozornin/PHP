<?php

namespace Src\Modules;

interface MoneyCollectorInterface
{
    public function earnMoney(float $amount): void;
    public function withdrawMoney(): string;
}