<?php

/**
 * Base controller
 * Loads the models and views
 * Date: 14/04/2019
 * Time: 01:23
 */
class Controller
{
    //LOAD model
    public function model($model)
    {
        //require model file
        require_once '../app/models/' . $model . '.php';
        //instatiate model
        return new $model();
    }

// LOAD view
    public function view($view, $data = [])
    {
        // Check for view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
//            view does not exist
            die('view does not exist');
        }
    }
}
