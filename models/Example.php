<?php

namespace app\models;

use app\core\Model;




class Example extends Model
{
    protected static string $table = 'examples';
    protected $fillable = ['id', 'name'];
    public $id;
    public $name;
}
