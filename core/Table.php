<?php

namespace app\core;


class Table
{

    private string $table;
    protected $db;
    protected $req;

    public function __construct($table)
    {
        $this->db = new Database();
        $this->table = $table;
    }



    public function prepare($sql)
    {
        $db = $this->db;
        $stmt = $db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


    public function fields($data)
    {
        $this->req = " create table " . $this->table . " ( ";
        foreach ($data as $key => $attrs) {
            $this->req .= " $key ";
            foreach ($attrs as $attr) {
                $this->req .= " $attr ";
            }
            $this->req .= ',';
        }

        $this->req = substr($this->req, 0, strlen($this->req) - 1);
    }

    public function timestamp()
    {
        $this->req .= " , created_at timestamp default current_timestamp , updated_at timestamp default current_timestamp ";
    }


    public function make()
    {
        $this->req .= ")";


        $stmt = $this->prepare($this->req);

        if ($stmt) {
            echo "table " . $this->table . " created successfully ! \n";
        }
    }
}
