<?php declare(strict_types=1);

namespace Nao\Example\Service\ScheduledTask;

use Shopware\Core\Framework\MessageQueue\ScheduledTask\ScheduledTask;

class ExampleTask extends ScheduledTask
{
    public static function getTaskName(): string
    {
        return 'nao.example_task';
    }

    public static function getDefaultInterval(): int
    {
        return 60; // 5 minutes
    }
}