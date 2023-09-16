<?php

namespace app\database\migration;

use app\core\Migration;
use app\core\Table;


class m1_migrations_migration extends Migration
{

    public function migrate()
    {

        $table = new Table('migrations');
        $table->fields([
            'id' => ['int', 'primary key', 'auto_increment'],
            'name' => ['varchar(255)'],
        ]);
        $table->timestamp();
        $table->make();
    }
}
