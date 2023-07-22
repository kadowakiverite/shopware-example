<?php declare(strict_types=1);

namespace Nao\Example\Service\ScheduledTask;

use Shopware\Core\Framework\MessageQueue\ScheduledTask\ScheduledTaskHandler;

class ExampleTaskHandler extends ScheduledTaskHandler
{
    public static function getHandledMessages(): iterable
    {
        return [ ExampleTask::class ];
    }

    public function run(): void
    {
        $now = new \DateTime();
        file_put_contents('example/file2.md', $now->format("Y-m-d H:i:s"),FILE_APPEND | LOCK_EX);
    }
}