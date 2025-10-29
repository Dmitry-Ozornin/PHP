<?php

namespace AppUnitTests;

use PHPUnit\Framework\TestCase;
use App\Worker;
use App\MoneyCollector;
use App\MoneyCollectorInterface;
use App\DummyMoneyCollector;
use App\FakeMoneyCollector;

class WorkerTest extends TestCase 
{
    public function testWorkCallEarnMoney()
    {
        //Prophecy
        $spy = $this->prophesize(MoneyCollector::class);
        $repo = $spy->reveal();
        $worker = new Worker($repo, 500);

        $worker->work(1);

        $spy->earnMoney(500)->shouldHaveBeenCalledOnce();

        // Mockery
        $spy = \Mockery::spy(MoneyCollector::class);
        $worker = new Worker($spy, 500);

        $worker->work(1);

        $spy->shouldHaveReceived('earnMoney');
    }

    public function testWorkSendCorrectAmountToEarnMoney()
    {
        // Prophecy
        $mock = $this->getMockBuilder(MoneyCollector::class)
            ->disableOriginalConstructor()
            ->getMock();

        // arrange    
        $mock->expects($this->once())
            ->method('earnMoney')
            ->with(500);
        
        $worker = new Worker($mock, 500);

        // act
        $worker->work(1);

        // Mockery
        $mock = \Mockery::mock(MoneyCollector::class);
        $mock->shouldReceive('earnMoney')
            ->with(500)
            ->once();

        $worker = new Worker($mock, 500);

        $worker->work(1);

        $mock->shouldHaveReceived('earnMoney')
            ->with(500)
            ->once();
    }

    public function testGoHomeCallWithdrawMoney()
    {
        // Dummy
        $stub = new DummyMoneyCollector();

        // Fake
        $stub = new FakeMoneyCollector();

        // Stub Prophecy
        $stub = $this->createMock(MoneyCollectorInterface::class);
        $stub->method('withdrawMoney')->willReturn('Какой-то текст');

        // Stub Mockery
        $stub = \Mockery::mock(MoneyCollectorInterface::class);
        $stub->shouldReceive('withdrawMoney')->andReturn('Какой-то текст');

        $worker = new Worker($stub, 500);

        $result = $worker->goHome();

        $this->assertStringContainsString("Это был тяжелый день.", $result);
    }

    public function testWorkEarnsMoney()
    {
        $collector = new FakeMoneyCollector();
        $worker = new Worker($collector, 500);

        $worker->work(2);

        $this->assertSame("Результат: 1000", $collector->withdrawMoney());
    }
}