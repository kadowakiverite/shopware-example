<?php declare(strict_types=1);

namespace Nao\Example\Migration;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1689949270ExampleDescription extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1689949270;
    }

    /**
     * @throws Exception
     */
    public function update(Connection $connection): void
    {
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS `swag_basic_example_general_settings` (
    `id`                INT             NOT NULL,
    `example_setting`   VARCHAR(255)    NOT NULL,
    PRIMARY KEY (id)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;
SQL;

        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}