<?php

namespace app\core;

use app\core\Application;
use app\models\ProductModel;
// use app\models\ProductModel;
// use app\models\ProductModel;
use PDO;


class Model
{
    protected static string $table;
    protected $fillable;
    protected Request $request;
    protected PDO $db;

    public function __construct()
    {
        $this->request = new Request();
        $this->initialLoad();
    }

    public function initialLoad()
    {
        $attributes = get_object_vars($this);

        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public static function setLoad($model, $data)
    {
        $attributes = get_object_vars($model);

        foreach ($attributes as $key => $value) {
            if (property_exists($model, $key) && array_key_exists($key, $data)) {
                $model->{$key} = $data[$key];
            }
        }
    }


    public static function prepare($sql)
    {
        $pdo = Application::$app->db->pdo;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public static function all()
    {
        $models = [];
        $sql = " select * from " . static::$table;
        $stmt = self::prepare($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $modelName = substr(static::$table, 0, strlen(static::$table) - 1);
        $class = "app\models\\" . ucfirst($modelName);

        foreach ($data as $dt) {
            $model = new $class;
            self::setLoad($model, $dt);
            array_push($models, $model);
        }

        return $models;
    }


    public function save()
    {

        $values = array_map(function ($val) {
            return "'{$this->$val}'";
        }, $this->fillable);

        $sql = "insert into " . static::$table . " (" . implode(",", $this->fillable) . ") ";
        $sql .= "values (" . implode(",", $values)  . ")";
        $stmt = $this->prepare($sql);

        return $stmt->rowCount();
    }

    public static function find($value, $colName = 'id')
    {
        $sql = " select * from " . static::$table . " where $colName = $value  ";
        $stmt = self::prepare($sql);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (empty($data)) {
            die("Not Found Ressource In Database !");
        }

        $modelName = substr(static::$table, 0, strlen(static::$table) - 1);
        $class = "app\models\\" . ucfirst($modelName);
        $model = new $class;

        self::setLoad($model, $data);
        return $model;
    }


    public function update()
    {
        $bindingData = [];

        $values = array_map(function ($val) {
            return "{$this->$val}";
        }, $this->fillable);

        for ($i = 0; $i < sizeof($this->fillable); $i++) {
            $bindingData[$this->fillable[$i]] = $values[$i];
        }

        $sql = " update " . static::$table . " set ";

        foreach ($bindingData as $key => $value) {
            $sql .= "$key = '$value' ,";
        }

        $sql = substr($sql, 0, strlen($sql) - 1);

        $sql .= "where id = " . $bindingData['id'];

        $stmt = $this->prepare($sql);

        return $stmt->rowCount();
    }

    public  function delete($value, $colName = 'id')
    {
        $sql = "delete from " . static::$table . " where $colName = $value  ";

        $stmt = $this->prepare($sql);

        return $stmt->rowCount();
    }
}
