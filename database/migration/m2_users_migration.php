<?php

namespace app\database\migration;

use app\core\Migration;
use app\core\Table;


class m2_users_migration extends Migration
{

    public function migrate()
    {

        $table = new Table('users');
        $table->fields([
            'id' => ['int', 'primary key', 'auto_increment'],
            'first_name' => ['varchar(255)'],
            'last_name' => ['varchar(255)'],
            'email' => ['varchar(255)'],
        ]);
        $table->timestamp();
        $table->make();
    }
}
