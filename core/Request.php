<?php

namespace app\core;


class Request
{
    protected Validation $validation;

    public function __construct()
    {
        $this->validation = new  Validation();
    }

    public static function getMethod()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        return $method;
    }

    public static function getPath()
    {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if (!$position) {
            $path = $path;
        } else {
            $path = substr($path, 0, $position);
        }

        return $path;
    }


    public function data()
    {
        if ($this->getMethod() === 'post') {
            $data = $_POST;
        }

        if ($this->getMethod() === 'get') {
            $data = $_GET;
        }

        return $data;
    }

    public function validate($rules)
    {
        $data = $this->data();

        $errors = $this->validation->validation($data, $rules);

        if (sizeof($errors) < 1) {
            return ["fails" => false, 'data' => $data];
        }

        return ["fails" => true, "errors" => $errors];
    }
}
