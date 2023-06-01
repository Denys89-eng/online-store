<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProducts extends AbstractMigration
{

    public function up(): void
    {
        $this->table('Products')
            ->addColumn('title', 'string')
            ->addColumn('description', 'text')
            ->addColumn('price', 'string')
            ->addColumn('category', 'string')
            ->create();

    }
}
