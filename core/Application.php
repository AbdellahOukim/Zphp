<?php

namespace app\core;

class Application
{
    protected Route $route;
    public Database $db;
    public static $app;

    public function __construct()
    {
        $this->route = new Route();
        if (!empty($_ENV['DB_NAME'])) {
            $this->db = new Database();
        }
        self::$app = $this;
    }

    public function run()
    {
        echo  $this->route->resolve();
    }
}
