<?php

namespace app\routes;

use app\controllers\GreetController;
use app\core\Route;


/** 
 *  The routes of your application goes here !
 *  The routes type avaliable at this time are [ post , get ]
 *  Happy coding ! 
 *  Author : Abdellah Oukim
 **/


//=> default view greet 

Route::get('/', [GreetController::class, 'greeting']);
