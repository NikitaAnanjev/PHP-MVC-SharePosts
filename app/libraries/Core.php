<?php
/**
 * Created by PhpStorm.
 * User: Nikita A
 * Date: 14/04/2019
 * Time: 01:09
 */

/**
 * App core class
 * Creates URL & Loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core
{
// PROPERTIES
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
// Parameters
    protected $params = [];

    public function __construct()
    {
//        print_r($this->getUrl());


        $url = $this->getUrl();

//        Look in controllers for controller(first INDEX)
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {

//        if exists, set as controller
            $this->currentController = ucwords($url[0]);

//            Unset 0 index
            unset($url[0]);
        }
//        require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

//        Instantiate controller class
        $this->currentController = new $this->currentController;

//        CHECK for second part of url
        if (isset($url[1])) {

//        Check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];

//                unset 1 index
                unset($url[1]);
            }
        }
//        echo $this->currentMethod;

// GET PARAMS


        $this->params = $url ? array_values($url) : [];

//        CALL a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

// Magic function to get URL from the browser Super GLobal
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}