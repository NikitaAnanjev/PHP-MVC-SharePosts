<?php
/**
 * Created by PhpStorm.
 * User: Nikita A
 * Date: 14/04/2019
 * Time: 01:25
 */



//LOAD CONFIG
require_once  'config/config.php';
//LOad libraries
require_once 'libraries/core.php';
require_once 'libraries/controller.php';
require_once 'libraries/database.php';


// Autoload core Libraries

spl_autoload_register(function ($className){
    require_once 'libraries/'. $className .'.php';


});