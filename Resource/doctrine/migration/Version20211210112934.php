<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20211210112934 extends AbstractMigration
{
    const TABLE_NAME = "user_register_metas";

    public function up(Schema $schema)
    {
        $this->createTableProductUseDate($schema);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable(self::TABLE_NAME);
    }

    protected function createTableProductuseDate(Schema $schema)
    {
        $table = $schema->createTable(self::TABLE_NAME);

        $table->addColumn('id', 'integer', ['autoincrement' => true, 'notnull' => false]);
        $table->addColumn('customer_id', 'integer', ['notnull' => false]);
        $table->addColumn('user_ip', 'string', ['notnull' => false]);
        $table->addColumn('user_agent', 'string', ['notnull' => false]);
        $table->addColumn('status', 'integer', ['notnull' => false]);
        $table->addColumn('created_at', 'date', ['notnull' => false]);

        $table->setPrimaryKey(array('id'));
    }
}
