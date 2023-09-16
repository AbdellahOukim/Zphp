<?php

namespace app\core;

use app\core\Database;


class Migration
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function prepare($sql)
    {
        $db = $this->db;
        $stmt = $db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


    public function saveMigration($migration)
    {
        $req = " insert into migrations ( name ) values ( '$migration' ) ";

        $this->prepare($req);
    }

    public function isMigrated($migration)
    {
        $dbName = $_ENV['DB_NAME'];
        $sql = "
        SELECT * 
        FROM information_schema.tables
        WHERE table_schema = '$dbName' 
        AND table_name = 'migrations'
        ";
        $stmt = $this->prepare($sql);
        $exist = $stmt->rowCount();


        if (!$exist) {
            return 0;
        } else {
            $req = "select id from migrations where name like '$migration'  ";
            $stmt = $this->prepare($req);
            $count = $stmt->rowCount();
            return $count;
        }
    }
}
