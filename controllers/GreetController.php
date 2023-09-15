<?php

namespace app\controllers;

use app\core\Controller;

class GreetController extends Controller
{

    /**
     * Display the greeting ressource view
     */

    public function greeting()
    {
        return $this->render('greet');
    }
}
