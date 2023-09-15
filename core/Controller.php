<?php

namespace app\core;


class Controller
{

    protected $view;
    protected $request;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render($view, $params = [])
    {
        return $this->view->render($view, $params);
    }

    public function redirectTo($path)
    {
        return header("location:$path");
    }
}
